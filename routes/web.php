<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AnnouncementController;

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
    return view('welcome_screen');
});

Route::get('/signUp', function () { 
    return view('auth.register');
   })->middleware('guest');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/checkuniqueness', [RegisteredUserController::class, 'checkUsernameEmailDuplicate']);



//announcements
Route::get('/announcement', function () { 
    return view('announcements.announcement');
});

// Route::get('/announcementList', function () { 
//     return view('announcements.announcementList');
// });
Route::get('/announcementList', [AnnouncementController::class, 'showAnnouncement']);


Route::get('/createannouncement/{id?}', [AnnouncementController::class, 'addAnnouncement']);
Route::post('/createannouncement/{id?}', [AnnouncementController::class, 'createAnnouncement']);

require __DIR__.'/auth.php';
require __DIR__.'/members.php';
