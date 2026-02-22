<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('alumni-admin')->name('alumni_admin.')->group(function () {

    // admin dashboard index page
    Route::get('/admin-index', [AdminController::class, 'index'])->name('admin-index');

    //==============================
    // create list and edit alumni
    //==============================

    /** create alumni  */
    Route::get('/add-alumni',[AdminController::class,'create'])->name('add-alumni');
    /**  store details of new alumni  */
    Route::post('/save-alumni',[AdminController::class,'storeAlumni'])->name('save-alumni');
    /**  list the alumni */
    Route::get('/tables-data',[AdminController::class,'alumniList'])->name('tables-data');
    /** edit specific alumni  */
    Route::get('edit-alumni/{id}',[AdminController::class,'editAlumni'])->name('edit-alumni');
    /** update alumni */
    Route::post('/update/{id}',[AdminController::class,'updateAlumni'])->name('update');

    //================
    // create post news
    //================

   // 1. News List Page
    Route::get('/post-news', [NewsController::class, 'post_news'])->name('post-news');
    // 2. Store News
    Route::post('/store-news', [NewsController::class, 'storeNews'])->name('store-news');
    // 3. Update News
    Route::post('/update-news/{id}', [NewsController::class, 'updateNews'])->name('update-news');


    //================
    // post events
    //================
    Route::get('/post-events',[AdminController::class,'postEvents'])->name('post-events');
   /** Store The Event */
    Route::post('/save-event',[AdminController::class,'saveEvent'])->name('save-event');
    /** Edit the events */
    Route::get('/edit-events/{id}',[AdminController::class,'edit_events'])->name('edit-events');
    /** update the event */
    Route::post('/update-event/{id}',[AdminController::class,'update_event'])->name('update-event');

    //================
    //  post a job
    //================
    Route::get('/post-job',[AdminController::class,'post_job'])->name('post-job');
    // store of job
    Route::post('/store-job',[AdminController::class,'store_job'])->name('store-job');

    //================================
    //  alumni_deployed_in_industries
    //================================
    Route::get('/alumni-indusries',[AdminController::class,'alumni_deployed_in_industry'])->name('alumni-indusries');

    //==============================
    //  view_roles and assign roles
    //===============================
    Route::get('/view-roles',[AdminController::class,'view_roles'])->name('view-roles');
    Route::post('/roles-assign',[AdminController::class,'assign_roles'])->name('roles_assign');
   Route::get('/create-role',[AdminController::class,'create_role'])->name('create-role');
    Route::post('/store-role',[AdminController::class,'store_roles'])->name('store-role');
});