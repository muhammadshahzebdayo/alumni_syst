<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
// =======================
// DASHBOARD INDEX DETAILED DATA
// =======================

public function index()
{
    $userId = Auth::id();

    // 1. Latest Jobs with Category (SQL Join - UI ke liye best)
    // Humne LIMIT 10 rakha hai taake dashboard heavy na ho
    $data['latestJobs'] = DB::select("
        SELECT j.job_id, j.title, j.company_name, j.location, jc.category_name, j.created_at, j.job_type
        FROM job j
        LEFT JOIN job_categories jc ON j.category_id = jc.category_id
        ORDER BY j.created_at DESC
        LIMIT 10
    ");

    // 2. Statistics (Quick Cards)
    $data['totalJobs']      = DB::table('job')->count();
    $data['appliedJobs']    = DB::table('job_applications')->where('user_id', $userId)->count();
    $data['alumniCount']    = DB::table('users')->where('role_id', 'Alumni')->count();

    // Aaj ke events ka count (Daily focus)
    $data['todayEventsCount'] = DB::table('events')
                                ->whereDate('event_date', now()->toDateString())
                                ->count();

    // 3. New Jobs in Last  week
    $data['newJobsWeekly'] = DB::table('job')
                                ->where('created_at', '>=', now()->subDays(7))
                                ->count();

    $data['myUpcomingEvents'] = DB::select("
        SELECT e.event_id, e.event_name, e.event_date, e.event_date
        FROM events e
        JOIN event_participants ep ON e.event_id = ep.event_id
        WHERE ep.user_id = ? AND e.event_date >= CURDATE()
        ORDER BY e.event_date ASC
        LIMIT 5
    ", [$userId]);

    return view('alumni_std.index', $data);
}

    // =======================
    // SHOW PROFILE
    // =======================

    public function profile(){
        $user_id= Auth::id();

        $request_profile = DB::selectOne("SELECT
            u.user_id,
            u.first_name,
            u.last_name,
            u.email,
            u.phone_number,
            u.gender,
            u.dob,
            u.address,
            u.profile_photo,
            a.graduation_year,
            a.current_job,
            a.designation,
            a.company_name,
            d.department_name
        FROM users u
        LEFT JOIN alumni a ON u.user_id = a.user_id
        LEFT JOIN departments d ON a.department_id = d.department_id
        WHERE u.user_id = ?
    ", [$user_id]);

    return  view('alumni_std.profile',compact('request_profile'));
    }

    // =======================
    // SHOW PROFILE EDIT FORM
    // =======================

public function edit_profile()
{
    $id = Auth::id();
    $edit_profile = DB::selectOne("
        SELECT
            u.user_id, u.first_name, u.last_name, u.email,
            u.phone_number,u.address, u.gender, u.dob, u.profile_photo,
            a.graduation_year, a.current_job, a.designation,
            a.company_name,d.department_id, d.department_name,d.faculty
        FROM users u
        LEFT JOIN alumni a ON u.user_id = a.user_id
        LEFT JOIN departments d ON a.department_id = d.department_id
        WHERE u.user_id = ?
    ", [$id]);

     //  fetch ALL departments
    $departments = DB::select("
        SELECT department_id, department_name
        FROM departments
        ORDER BY department_name ASC
    ");
    if (!$edit_profile) {
        abort(404, 'Profile not found');
    }

    return view('alumni_std.edit_profile', compact('edit_profile','departments'));
}

     // =======================
    // UPDATE Profile
    // =======================

    public function updateProfile(Request $request)
{
    $user_id = Auth::id();
    // UPDATE users table
    DB::update("
        UPDATE users SET first_name = ?, last_name = ?,phone_number = ?, gender = ?,
        address = ? WHERE user_id = ?
    ", [ $request->first_name,
        $request->last_name,
        $request->phone_number,$request->gender,
        $request->address,$user_id ]);

    // here i UPDATE alumni table
    DB::update("
        UPDATE alumni SET
            graduation_year = ?,
            designation = ?,
            company_name = ?,
            department_id = ?
        WHERE user_id = ?
    ", [
        $request->graduation_year,
        $request->designation,
        $request->company_name,
        $request->department_id,
        $user_id
    ]);

    return redirect()
        ->route('alumni_std.profile')
        ->with('success', 'Profile updated successfully!');
}

     // =======================
    // SHOW ALL  EVENTS
    // =======================

public function events(){
        $userId = Auth::id();

        //1. My Registered Events
        $myEvents = DB::select("
            SELECT e.*
            FROM events e
            INNER JOIN event_participants ep
                ON e.event_id = ep.event_id
            WHERE ep.user_id = ?
        ", [$userId]);

        //2. Upcoming Events (NOT registered by user)
        $upcomingEvents = DB::select("
            SELECT *
            FROM events
            WHERE event_date >= CURDATE()
            AND event_id NOT IN (
                SELECT event_id
                FROM event_participants
                WHERE user_id = ?
            )
            ORDER BY event_date ASC
        ", [$userId]);

        return view('alumni_std.events', compact('myEvents', 'upcomingEvents'));

        // $user = Auth::user();
        // $events = DB::select("SELECT * FROM EVENTS WHERE event_date > CURRENT_DATE ");
        // return view('alumni_std.events',compact('user','events'));
}

    // =======================
    // SHOW  SPECIFIC EVENT
    // =======================

public function events_show($id){

    $userId = Auth::id();
        // 🔹 Event Detail
        $event = DB::selectOne("
            SELECT *
            FROM events
            WHERE event_id = ?
        ", [$id]);

        // 🔹 Already Registered or Not
        $alreadyRegistered = DB::selectOne("
            SELECT participant_id
            FROM event_participants
            WHERE event_id = ?
            AND user_id = ?
        ", [$id, $userId]);

        return view('alumni_std.events_show', [
            'event' => $event,
            'alreadyRegistered' => $alreadyRegistered ? true : false
        ]);
    }

    // =======================
    // JOIN EVENT
    // =======================

    public function join($id)
    {
        $userId = Auth::id();

        // 🔹 Safety check (avoid duplicate entry)
        $exists = DB::selectOne("
            SELECT participant_id
            FROM event_participants
            WHERE event_id = ?
            AND user_id = ?  ", [$id, $userId]);

        if (!$exists) {
            DB::insert("
                INSERT INTO event_participants (event_id, user_id, created_at)
                VALUES (?, ?, NOW())
            ", [$id, $userId]);
        }

        return redirect()
            ->route('alumni_std.events')
            ->with('success', 'Successfully registered for the event!');
    }

public function alumni_directory()
{
    // RAW SQL
    $alumni = DB::select("
   SELECT DISTINCT
    u.user_id,
    u.first_name,
    u.last_name,
    u.email,
    u.phone_number,
    u.profile_photo,
    a.alumni_id,
    a.graduation_year,
    a.current_job,
    a.designation,
    a.company_name,
    d.department_name
FROM alumni a
JOIN users u
    ON a.user_id = u.user_id
LEFT JOIN departments d
    ON a.department_id = d.department_id
ORDER BY a.graduation_year DESC;

        ");

    return view('alumni_std.alumni_directory', compact('alumni'));
}


public function alumni_show($id)
{
    $alumni = DB::selectOne("
        SELECT u.user_id,a.alumni_id, u.first_name, u.last_name, u.email, u.password,
        u.phone_number, u.address,u.`gender`,
        u.`dob`, a.graduation_year, a.current_job,
        a.designation, a.company_name, d.department_name, u.profile_photo
        FROM users u
        LEFT JOIN alumni a ON u.user_id = a.user_id
        LEFT JOIN departments d ON a.department_id = d.department_id
        WHERE u.user_id = ?

        ORDER BY a.graduation_year DESC

    ", [$id]);

    if (!$alumni) {
        abort(404, 'Alumni not found.');
    }

    return view('alumni_std.alumni_profile_show', compact('alumni'));
}


public function jobs(Request $request)
{
    $query = DB::table('job')
        ->join('job_categories', 'job.category_id', '=', 'job_categories.category_id')
        ->select('job.*', 'job_categories.category_name')
        ->where('status', 'Active');

    // Search Filter
    if ($request->has('search')) {
        $query->where(function($q) use ($request) {
            $q->where('title', 'like', '%' . $request->search . '%')
              ->orWhere('company_name', 'like', '%' . $request->search . '%')
              ->orWhere('description', 'like', '%' . $request->search . '%');
        });
    }

    // Job Type Filter (Internship, Full-time, etc.)
    if ($request->has('type') && $request->type != 'All') {
        $query->where('job_type', $request->type);
    }

    $jobs = $query->orderBy('created_at', 'desc')->paginate(9);

    return view('alumni_std.jobs', compact('jobs'));
}
public function jobs_show(){
    return view('alumni_std.jobs');
}
public function view_jobs($id)
{
    $job = DB::selectOne("
        SELECT j.*, jc.category_name
        FROM job j
        LEFT JOIN job_categories jc ON j.category_id = jc.category_id
        WHERE j.job_id = ?
    ", [$id]);

    if (!$job) {
        abort(404, 'Job not found.');
    }

    return view('alumni_std.view_jobs', compact('job'));
    }
}