<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;




/*
|--------------------------------------------------------------------------
| Alumni Student Dashboard  All Done
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('alumni_std')->name('alumni_std.')->group(function () {
    //  index page

    Route::get('/index', [StudentController::class, 'index'])->name('index');

    //  profile pages
    Route::get('/profile', action: [StudentController::class, 'profile'])->name('profile');
    Route::get('/edit_profile/{id}', [StudentController::class, 'edit_Profile'])->name('edit_profile');
    Route::post('/update_profile', [StudentController::class, 'updateProfile'])->name('update_profile');

    //  events pages cleared
    Route::get('/events',[StudentController::class ,'events'])->name('events');
    Route::get('/events_show/{id}', [StudentController::class, 'events_show'])->name('events_show');
    Route::post( '/events/{id}/join',  [StudentController::class, 'join'])->name('events.join');

   // alumni pages on student panel
    Route::get('/alumni_directory',[StudentController::class, 'alumni_directory'])->name('alumni_directory');
    Route::get('/alumni_profile_show/{id}',[StudentController::class, 'alumni_show'])->name('alumni_profile_show');

    // jobs page
    Route::get('/jobs',[StudentController::class, 'jobs'])->name('jobs');
    Route::get('/view_jobs/{id}', [StudentController::class, 'view_jobs'])->name('view_jobs');
});
