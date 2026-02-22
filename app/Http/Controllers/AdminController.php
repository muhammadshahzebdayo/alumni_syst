<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{
    Alumni,
    News,
    Event
};
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{

        /**
         * Summary of index
         * 
         */

    public function index() {

        // Alumni count (where role_id = 2)
        $alumniCount = DB::select("SELECT COUNT(*) as total FROM users WHERE role_id = 2")[0]->total;

        // Events count
        $eventsCount = DB::select("SELECT COUNT(*) as total FROM events")[0]->total;

        // Jobs count (Table name is 'job')
        $jobsCount = DB::select("SELECT COUNT(*) as total FROM job")[0]->total;

        // assuming you might add it later or checking if they have no alumni profile yet)
        $pendingReq = DB::select("SELECT COUNT(*) as total FROM users WHERE role_id IS NULL")[0]->total;

        $stats = [
            'alumni'  => $alumniCount,
            'events'  => $eventsCount,
            'jobs'    => $jobsCount,
            'pending' => $pendingReq,
        ];

        // 2. Latest 5 Events
        $latestEvents = DB::select("SELECT * FROM events ORDER BY event_date DESC LIMIT 5");

        // 3. Recent 4 Alumni (Joining Users with Alumni and Departments table)
        $recentAlumni = DB::select("
            SELECT u.first_name, u.last_name, a.graduation_year as batch, d.department_name 
            FROM users u
            INNER JOIN alumni a ON u.user_id = a.user_id
            LEFT JOIN departments d ON a.department_id = d.department_id
            WHERE u.role_id = 2
            ORDER BY u.created_at DESC
            LIMIT 4
        ");


        return view('alumni-admin.admin-index', compact('stats', 'latestEvents', 'recentAlumni'));
    }





// ===========================
// create , store , list and edit alumni
// ===========================
        public function create(){
            $departments = DB::select('SELECT * FROM departments');
            return view('alumni-admin.add-alumni', compact('departments'));
        }
        public function storeAlumni(Request $request)
        {
        // Validation
        // dd( $request->all());

        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|min:4|',
            'department_id'    => 'required',
            'graduation_year'  => 'required|digits:4',
        ]);

        try {
            DB::beginTransaction();

            // 1. Users table mein entry
            $userId = DB::table('users')->insertGetId([
                'first_name'   => $request->first_name,
                'last_name'    => $request->last_name,
                'email'        => $request->email,
                'password'     => Hash::make($request->password),
                'role_id'      => 2, // 2 = Student/Alumni role
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);

            // 2. Alumni table mein entry
            DB::table('alumni')->insert([
                'user_id'         => $userId,
                'department_id'   => $request->department_id,
                'graduation_year' => $request->graduation_year,
                'created_at'      => now(),
                'updated_at'      => now(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Alumni successfully registered!');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Err Occured: ' . $e->getMessage());
        }
        }

    /** * Display a listing of the alumni. */
        public function alumniList()
        {
        $alumni = DB::select('SELECT * FROM alumni, users,Departments
        WHERE alumni.user_id = users.user_id
        AND   alumni.department_id =departments.department_id  ');
        // dd($alumni)->toArray();
        return view('alumni-admin.tables-data', compact('alumni'));
        }

    /**  Show the form for editing the specified alumni.  */
        public function editAlumni($id)
            {
                $alumni =DB::selectOne('Select * from  users,alumni where alumni.user_id = users.user_id and alumni.alumni_id = ?', [$id]);
                return view('alumni-admin.edit-alumni', compact('alumni'));
            }
    /** * Update the specified alumni in storage. */
        public function updateAlumni(Request $request, $id)
        {
            // 1. Pehle Alumni aur User ID fetch kar lein taake validation mein use ho sake
            $alumniCheck = DB::selectOne("SELECT user_id FROM alumni WHERE alumni_id = ?", [$id]);

            if (!$alumniCheck) {
                return redirect()->back()->with('error', 'Record not found!');
            }

            $user_id = $alumniCheck->user_id;
            // 2. Enhanced Validation
            $request->validate([
                // Unique check: Is email ko check karo lekin current user_id ko chhor kar
                'email' => 'required|email|unique:users,email,' . $user_id . ',user_id',
                'department_id' => 'required|exists:departments,department_id',
                'password' => 'nullable|min:4',
            ]);
            try {
                DB::beginTransaction();

                // 3. Update Users Table (Email)
                DB::update("UPDATE users SET email = ?, updated_at = ? WHERE user_id = ?", [
                    $request->email,
                    now(),
                    $user_id
                ]);

                // 4. Update Password
                if ($request->filled('password')) {
                    DB::update("UPDATE users SET password = ? WHERE user_id = ?", [
                        Hash::make($request->password),
                        $user_id
                    ]);
                }

                // 5. Update Alumni Table (Department)
                DB::update("UPDATE alumni SET department_id = ?, updated_at = ? WHERE alumni_id = ?", [
                    $request->department_id,
                    now(),
                    $id
                ]);

                DB::commit();

                // Success message ke sath wapis list par bhejna behtar hota hai
                return redirect()->back()->with('success', 'Alumni record has been updated successfully!');

            } catch (\Exception $e) {
                DB::rollback();
                // Technical error ko handle karein
                return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
            }
        }

// ===========================
// create post & edit events
// ===========================


/* * Show the form for posting an event */
        public function postEvents()
        {
        $events = Event::orderBy('event_date', 'desc')->get();
            return view('alumni-admin.post-events', compact('events'));
        }

/** * Store a newly created event in storage. */
        public function saveEvent(Request $request)
        {

            // dd($request->all());

            $request->validate([
                'event_name' => 'required',
                'event_date' => 'required|date',
                'description' => 'required',
                'event_location' => 'required|string|max:255',
                'organizer' => 'nullable|string|max:255',
            ]);


            DB::insert('INSERT into events( event_name,description, event_date,location,organizer,created_at,updated_at)
            VALUES(?, ?, ?, ?, ?, ?, ?)',[
                $request->event_name,
                $request->description,
                $request->event_date,
                $request->event_location,
                $request->organizer,
                now(), now()  ]);
            return redirect()->back()->with('success', 'Event published successfully!');
}

    public function edit_events(Request $request,$id){

            $event = DB::selectOne('select * from events where events.event_id = ?', [$id]);
            return view('alumni-admin.edit-events',compact('event'));
    }

    public function update_event(Request $request,$id){
        $validate=[
            'event_name'=>'required|max:50',
            'event_organizer'=>'required|max:10',
            'event_description'=>'required |max:255',
            'event_date'=>'required|date |after_or_equal:today',
        ];
    // dd($request->all());

        $update = DB::update('update events set event_name = ?, organizer = ?, description = ?, event_date = ?,updated_at = ? where event_id = ?', [
            $request->event_name,
            $request->event_organizer,
            $request->event_description,
            $request->event_date,
            now(),
            $id
        ]);

        // AFTER THE UPDATE OF SUCCESFULL IT HAVE TO GO  ON POST-EVETNS PAGE WITH SUCCESS MESSAGE
    return redirect()->route('alumni_admin.post-events')->with('success', 'Event updated successfully!');
    }

//  =========================
//  posting & Storing  jobs
// ==========================

/*   *create job */
        public function post_job() {
            $categories = DB::select("SELECT * FROM job_categories ORDER BY category_name ASC");

            $companies = DB::select("SELECT DISTINCT company_name FROM job WHERE company_name IS NOT NULL");

            $jobs = DB::select("SELECT j.*, c.category_name
                                FROM job j
                                JOIN job_categories c ON j.category_id = c.category_id
                                ORDER BY j.created_at DESC");


            return view('alumni-admin.post-job', compact('categories', 'jobs', 'companies'));
        }
 /* store job */
        public function store_job(Request $request){
            // $id =Auth::user()->id;
            $request->validate([
                'title' => 'required',
                'company_name' => 'required|string|max:150',
                'category_id' => 'required',
                'job_type' => 'required',
                'deadline' => 'required|date',
                'location' => 'required|string|max:255',
                'salary_range' => 'required|string|max:100',
                'description' => 'required'
            ]);
            // dd( $request->all());
            try {
                DB::insert("INSERT INTO job (user_id, category_id, title, company_name, description, location, job_type, salary_range, deadline, status, created_at, updated_at)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'Active', ?, ?)", [
                    auth('web')->id() ?? 1,
                    $request->category_id,
                    $request->title,
                    $request->company_name,
                    $request->description,
                    $request->location,
                    $request->job_type,
                    $request->salary_range,
                    $request->deadline,
                    now(),
                    now()
                ]);

                return redirect()->back()->with('success', 'Job for ' . $request->company_name . ' posted!');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
            }
        }
/** see the alumni deployed in industries  */
        public function alumni_deployed_in_industry() {

        $adminId = auth('web')->id() ?? 1;

        $adminDept = DB::selectOne("SELECT department_id FROM alumni WHERE user_id = ?", [$adminId]);

        if (!$adminDept) {
            return redirect()->back()->with('error', 'You are not assigned to any department!');
        }

        $deptId = $adminDept->department_id;


        $alumniList = DB::select("
            SELECT
                u.first_name,
                u.last_name,
                u.email,
                a.graduation_year,
                a.current_job,
                a.company_name,
                a.designation,
                d.department_name
            FROM alumni a
            JOIN users u ON a.user_id = u.user_id
            JOIN departments d ON a.department_id = d.department_id
            WHERE a.department_id = ?
            ORDER BY a.graduation_year DESC
        ", [$deptId]);

        return view('alumni-admin.alumni-indusries', compact('alumniList'));
        }

        // *           =========================
        //*view create and assign roles to users
        // *          ==========================

        public function view_roles() {
            $roles = DB::select("SELECT * FROM user_roles ORDER BY role_name ASC");

            $users = DB::select("
                SELECT
                    u.user_id,
                    u.first_name,
                    u.last_name,
                    u.email,
                    u.role_id,
                    r.role_name
                FROM users u
                LEFT JOIN user_roles r ON u.role_id = r.role_id
                ORDER BY u.first_name ASC, u.last_name ASC
            ");

            return view('alumni-admin.view-roles', compact('roles', 'users'));
        }

        public function assign_roles(Request $request)
        {
            $request->validate([
                'user_id' => 'required|exists:users,user_id',
                'role_id' => 'required|exists:user_roles,role_id'
            ]);
        // dd($request->all());
            try {
                DB::update("UPDATE users SET role_id = ?, updated_at = ? WHERE user_id = ?", [
                    $request->role_id,
                    now(),
                    $request->user_id
                ]);

                return redirect()->back()->with('success', 'Role updated successfully!');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Something went wrong!');
            }
        }

        /** create roles */
        public function create_role()
        {
            return view('alumni-admin.create-role');
        }

    /** to store the roles */
        public function store_roles(Request $request) {
            $request->validate(['role_name' => 'required|unique:user_roles,role_name']);


            DB::insert("INSERT INTO user_roles (role_name, created_at, updated_at) VALUES (?, ?, ?)", [
                $request->role_name, now(), now()
            ]);

            return redirect()->back()->with('success', 'New Role Created!');
        }

}