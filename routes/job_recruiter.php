<?php


use App\Http\Controllers\JobRecruiterController ;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;  // if any need of auth will use it
/*
|--------------------------------------------------------------------------
| Hr Recruiter Dashboard
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('job_recruiter')->name('job_recruiter.')->group(function () {
Route::get('/index',[JobRecruiterController::class,'index'] )->name('index');
// Dashboard Index
Route::get('/index', [JobRecruiterController::class, 'index'])->name('index');

// Create New Job (Form)
Route::get('/create', [JobRecruiterController::class, 'create'])->name('create');

// Store Job (Post request for the form)
Route::post('/store', [JobRecruiterController::class, 'store'])->name('store');

// Manage Postings (List of jobs posted by this HR)
Route::get('/posts', [JobRecruiterController::class, 'managePosts'])->name('posts');

// Review Applicants (Applications view)
Route::get('/application_view', [JobRecruiterController::class, 'view_applications'])->name('application_view');
// Specific Applicant Profile View
Route::get('/job_applicant_profile/{id}', [JobRecruiterController::class,
'view_applicant_profile'])->name('job_applicant_profile');

// Company Profile (Placeholder for now)
Route::get('/company_profile', [JobRecruiterController::class, 'companyProfile'])->name('company_profile');
// company profile edit
Route::get('/edit_profile', [JobRecruiterController::class, 'edit_profile'])->name('edit_profile');
Route::post('/job_recruiter/update-profile', [JobRecruiterController::class, 'update_profile'])->name('update_profile');
});
