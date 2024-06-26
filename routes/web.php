<?php

use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route("login");
});
Auth::routes();
Route::post('user/register',        [App\Http\Controllers\UserController::class, 'registerUser'])->name('signup-process');
Route::post('/getAddress',          [App\Http\Controllers\DropdownController::class, 'getAddress'])->name('getAddress'); // for get land list
//get program
Route::post('/getProgram',          [App\Http\Controllers\DropdownController::class, 'getProgram'])->name('getProgram'); // for get program list

/**
 * Admin  Routes
 */
Route::group(['namespace' => 'Backend', 'prefix' => '/admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin', 'status']], function () {
    include('Backend/Backend.php');
});
/**
 * User  Routes
 */
Route::group(['namespace' => 'User', 'prefix' => '/user', 'as' => 'user.', 'middleware' => ['auth', 'user', 'status']], function () {
    include('User/User.php');
});

/**
 * site route
 */

Route::group(['as' => 'site.', 'namespace' => 'Site'], function () {
    /**
     * Route for home page
     */
    Route::get('/',                                           [App\Http\Controllers\Site\SiteController::class, 'index'])->name('index');
    // All College List
    Route::get('/all-colleges',                                [App\Http\Controllers\Site\SiteController::class, 'allCollege'])->name('allcollege');
    // COllege details
    Route::get('/college/{id}',                                [App\Http\Controllers\Site\SiteController::class, 'collegeDetails'])->name('post.show');
    // College Program
    Route::get('/program/{id}',                                [App\Http\Controllers\Site\SiteController::class, 'ProgramCategory'])->name('program.category');
    // Contact Us
    Route::get('/contact',                                     [App\Http\Controllers\Site\SiteController::class, 'contact'])->name('contact');
    // Message
    Route::post('/message',                                    [App\Http\Controllers\Site\SiteController::class, 'Message'])->name('message');

    // Search
    Route::get('/search',                                      [App\Http\Controllers\Site\SiteController::class, 'search'])->name('search');
    // Carrer Page
    Route::get('/career',                                      [App\Http\Controllers\Site\SiteController::class, 'Career'])->name('career');
});
