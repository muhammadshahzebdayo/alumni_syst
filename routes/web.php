<?php

//use App\Http\Controllers\JobRecruiterController;//shifted to the recruiter file
// use App\Http\Controllers\StudentController;   // shifted to student file
//use App\Http\Controllers\NewsController;      // shifted to alumni-admin file
//use App\Http\Controllers\AdminController;    // shifted to alumni-admin file
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/meetings', function () {
    return view('meetings');
})->name('meetings');

Route::get('/meeting-details', function () {
    return view('meeting-details');
})->name('meeting.details');
Route::get('/alumni-admin/installation-guide',function(){ return view('alumni-admin.installation-guide');})->name('installation-guide');
Route::get('/alumni-admin/user-guide',function(){ return view('alumni-admin.user-guide'); })->name('user-guide');
// logout forcefully
Route::get('/logout', function(){     Auth::logout();     return view('index');   });
// route for register page
Route::get('/register', function(){     return view('auth.register');   })->name('register');




require __DIR__.'/auth.php';
require __DIR__.'/job_recruiter.php';
require __DIR__.'/alumni_student.php';
require __DIR__.'/alumni_admin.php';
