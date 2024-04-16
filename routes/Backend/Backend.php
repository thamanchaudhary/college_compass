<?php
Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('index');
/**
 * Users Routes
 */
Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\UserController::class, 'index'])->name('index');
    Route::get('create',                               [App\Http\Controllers\Admin\UserController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\UserController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\UserController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('destroy');
    Route::get('delete_item',                          [App\Http\Controllers\Admin\UserController::class, 'deletedPost'])->name('deleted_item');
    Route::put('restore/{id}',                         [App\Http\Controllers\Admin\UserController::class, 'restore'])->name('restore');
    Route::delete('permanent_delete/{id}',             [App\Http\Controllers\Admin\UserController::class, 'permanentDelete'])->name('delete');
    Route::post('/status',                             [App\Http\Controllers\Admin\UserController::class, 'status'])->name('status');
});
/** Main Setup Part
 */
Route::group(['prefix' => 'location',                'as' => 'location.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\LocationController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\LocationController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\LocationController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\LocationController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\LocationController::class, 'update'])->name('update');
    Route::get('/{id}',                                [App\Http\Controllers\Admin\LocationController::class, 'destroy'])->name('destroy');
    Route::get('/show/{id}',                           [App\Http\Controllers\Admin\LocationController::class, 'show'])->name('show');
});


/** 
 * COllege List  ////
 */
Route::group(['prefix' => 'college',                'as' => 'college.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\CollegeListController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\CollegeListController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\CollegeListController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\CollegeListController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\CollegeListController::class, 'update'])->name('update');
    Route::get('/{id}',                             [App\Http\Controllers\Admin\CollegeListController::class, 'destroy'])->name('destroy');
    Route::get('/show/{id}',                           [App\Http\Controllers\Admin\CollegeListController::class, 'show'])->name('show');
});
/** 
 * University Setup  ////
 */
Route::group(['prefix' => 'university',                     'as' => 'university.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\UniversityController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\UniversityController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\UniversityController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\UniversityController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\UniversityController::class, 'update'])->name('update');
    Route::get('/{id}',                                [App\Http\Controllers\Admin\UniversityController::class, 'destroy'])->name('destroy');
    Route::get('/show/{id}',                           [App\Http\Controllers\Admin\UniversityController::class, 'show'])->name('show');
});
/** 
 * Program Setup  ////
 */
Route::group(['prefix' => 'program',                     'as' => 'program.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\ProgramController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\ProgramController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\ProgramController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\ProgramController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\ProgramController::class, 'update'])->name('update');
    Route::get('/{id}',                                [App\Http\Controllers\Admin\ProgramController::class, 'destroy'])->name('destroy');
    Route::get('/show/{id}',                           [App\Http\Controllers\Admin\ProgramController::class, 'show'])->name('show');
});







/**
 * Messages Routes
 */
Route::group(['prefix' => 'message', 'as' => 'message.'], function () {
    Route::get('/',                             [App\Http\Controllers\Admin\MessageController::class, 'index'])->name('index');
    Route::get('create',                        [App\Http\Controllers\Admin\MessageController::class, 'create'])->name('create');
    Route::post('',                             [App\Http\Controllers\Admin\MessageController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                    [App\Http\Controllers\Admin\MessageController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                 [App\Http\Controllers\Admin\MessageController::class, 'update'])->name('update');
    Route::get('/delete/{id}',                  [App\Http\Controllers\Admin\MessageController::class, 'delete'])->name('delete');
});


/**
 * Settings Routes
 */
Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
    Route::get('/',                             [App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('index');
    Route::post('/update/{id}',                 [App\Http\Controllers\Admin\SettingsController::class, 'update'])->name('update');

    Route::group(['prefix' => 'social', 'as' => 'social.'], function () {
        Route::get('',                       [App\Http\Controllers\Admin\SettingsController::class, 'getSocialProfiles'])->name('index');
        Route::post('{social}',              [App\Http\Controllers\Admin\SettingsController::class, 'updateSocialProfiles'])->name('store');
    });
});

/**
 * User Profile Routes
 */
Route::group(['prefix' => 'user_profile', 'as' => 'user_profile.'], function () {
    Route::get('/',                          [App\Http\Controllers\Admin\UsersProfileController::class, 'index'])->name('index');
    Route::get('/create',                    [App\Http\Controllers\Admin\UsersProfileController::class, 'create'])->name('create');
    Route::post('',                          [App\Http\Controllers\Admin\UsersProfileController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                 [App\Http\Controllers\Admin\UsersProfileController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',              [App\Http\Controllers\Admin\UsersProfileController::class, 'update'])->name('update');
    Route::delete('/{id}',                   [App\Http\Controllers\Admin\UsersProfileController::class, 'destroy'])->name('destroy');
    Route::get('/show}',                     [App\Http\Controllers\Admin\UsersProfileController::class, 'show'])->name('show');
    Route::post('/}',                        [App\Http\Controllers\Admin\UsersProfileController::class, 'passwordChange'])->name('passwordChange');
});
