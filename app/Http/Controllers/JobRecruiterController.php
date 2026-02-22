<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JobRecruiterController extends Controller
{

/**
 * =======================
 *   DASHBOARD OF RECRUITER
 * ========================
 */
    public function index() {
    $recruiter_id = Auth::id();

    // 1. Total Postings (Raw SQL)
    $total_postings = DB::select("SELECT COUNT(*) as count FROM job WHERE user_id = ?", [$recruiter_id])[0]->count;

    // 2. Total Applicants (Raw SQL Join)
    $total_applicants = DB::select("
        SELECT COUNT(ja.application_id) as count
        FROM job_applications ja
        INNER JOIN job j ON ja.job_id = j.job_id
        WHERE j.user_id = ?
    ", [$recruiter_id])[0]->count;

    // 3. Recent Jobs
    $active_jobs = DB::select("
        SELECT job_id, title, status, created_at
        FROM job
        WHERE user_id = ?
        ORDER BY created_at DESC
        LIMIT 5
    ", [$recruiter_id]);

    // 4. Recent Applicants Pulse
    $recent_applicants = DB::select("
        SELECT u.first_name,u.last_name ,j.title as job_title, ja.created_at, u.profile_photo
        FROM job_applications ja
        INNER JOIN job j ON ja.job_id = j.job_id
        INNER JOIN users u ON ja.user_id = u.user_id
        WHERE j.user_id = ?
        ORDER BY ja.created_at DESC
        LIMIT 6
    ", [$recruiter_id]);

    return view('job_recruiter.index', compact(
        'total_postings',
        'total_applicants',
        'active_jobs',
        'recent_applicants'
    ));
}

// =======================
//  SHOW JOB POSTINGS
//========================
public function create(){

    $categories = DB::select("SELECT * FROM job_categories"); // Categories fetch karein
    return view('job_recruiter.create', compact('categories'));    }

// =======================
//  STORE THE JOB POSTING
//========================

public function store(Request $request)
{
    // dd($request->all());
    $request->validate([
        'user_id'=> 'required',
        'category_id'  => 'required',
        'title'        => 'required|max:255',
        'company_name' => 'required',
        'description'  => 'required',
        'job_type'     => 'required',
        'location'     => 'required|string|max:255',
        'salary_range' => 'nullable|string|max:100',
        'deadline'     => 'required|date|after:today',
    ]);

    try {
        // Query check: table name 'job' aur column 'title' confirm karein
        DB::insert('INSERT INTO job
            (user_id, category_id, title, company_name, description, job_type,location,salary_range, deadline, created_at)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)',
            [
                $request-> user_id,
                $request->category_id,
                $request->title,
                $request->company_name,
                $request->description,
                $request->job_type,
                $request->location,
                $request->salary_range,
                $request->deadline,
                now()
            ]
        );

        return redirect()->route('job_recruiter.posts')->with('success', 'Vacancy Published Successfully!');

    } catch (\Illuminate\Database\QueryException $e) {
        // catch  specifically Database ka error
        return back()->withInput()->with('error', 'Database Error: ' . $e->getMessage());
    } catch (\Exception $e) {
        // catch   general errors
        return back()->withInput()->with('error', 'General Error: ' . $e->getMessage());
    }
}

// =======================
//  MANAGE POSTS
//========================

public function managePosts(){
    $jobs = DB::select("
        SELECT j.*, c.category_name
        FROM job j
        JOIN job_categories c ON j.category_id = c.category_id
        WHERE j.user_id = ?
        ORDER BY j.created_at DESC
    ", [Auth::id()]);

    return view('job_recruiter.posts', compact('jobs'));
}

// =======================
//  VIEW JOB APPLICANTS
//========================

public function view_applications(){

   $applicants = DB::select("SELECT
    j.job_id,
    u.user_id,
    u.first_name,
    u.last_name,
    j.title AS job_role,
    ja.applied_at,
    j.status AS application_status,
    a.graduation_year
FROM job_applications AS ja
INNER JOIN users AS u ON ja.user_id = u.user_id
INNER JOIN job AS j ON ja.job_id = j.job_id
LEFT JOIN alumni AS a ON a.user_id = u.user_id
WHERE j.user_id = ?
ORDER BY ja.applied_at DESC",[Auth::id()]);



    return view('job_recruiter.application_view', compact('applicants'));
}


// ==================================
//  VIEW SPECIFIC APPLICANT PROFILE
//===================================

public function view_applicant_profile($id)
{
$applicant = DB::table('users as u')
        ->leftJoin('alumni as a', 'u.user_id', '=', 'a.user_id')
        ->leftJoin('departments as d', 'a.department_id', '=', 'd.department_id')
        ->select('u.*', 'a.*', 'd.department_name')
        ->where('u.user_id', $id)
        ->first();

    if (!$applicant) {
        return redirect()->back()->with('error', 'Profile not found.');
    }
    return view('job_recruiter.job_applicant_profile', compact('applicant'));
}


// ====================
// RECRUITER PROFILE
//=====================

    public function companyProfile(){
    $recruiterId = Auth::id();

    // Recruiter ki basic info
    $recruiter = DB::table('users')->where('user_id', $recruiterId)->first();

    // Insights: Kitni jobs post ki hain
    $totalJobs = DB::table('job')->where('user_id', $recruiterId)->count();

    // Insights: Kitne total applicants aaye hain is recruiter ki jobs par
    $totalApplicants = DB::table('job_applications as ja')
        ->join('job as j', 'ja.job_id', '=', 'j.job_id')
        ->where('j.user_id', $recruiterId)
        ->count();

    // Recent Activity: Last 3 jobs posted
    $recentActivity = DB::table('job')
        ->where('user_id', $recruiterId)
        ->orderBy('created_at', 'DESC')
        ->limit(3)
        ->get();

    return view('job_recruiter.company_profile', compact('recruiter', 'totalJobs', 'totalApplicants', 'recentActivity'));
}
// =======================
//  EDIT PROFILE
//========================



public function edit_profile()
{
    $recruiter = DB::table('users')->where('user_id', Auth::id())->first();
    $recruiter_data = DB::table('Alumni')->join('users', 'Alumni.user_id', '=', 'users.user_id')
        ->where('users.user_id', Auth::id())
        ->select('users.*', 'Alumni.*')
        ->first();
    return view('job_recruiter.edit_profile', compact('recruiter', 'recruiter_data'));
}



//========================
//  UPDATE PROFILE
//========================

public function update_profile(Request $request)
{
    // Validation
    // dd( $request->all());

    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'company_name' => 'required|string|max:255',
        'phone_number' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:500',
    ]);

    // Update Query
    DB::table('users')
        ->where('user_id', Auth::id())
        ->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'updated_at' => now(),
        ]);
        Db::table('Alumni')
        ->update([
            'company_name' => $request->company_name,
            'updated_at' => now(),
        ]);

    return redirect()->route('job_recruiter.company_profile')->with('success', 'Profile updated successfully!');
}
}