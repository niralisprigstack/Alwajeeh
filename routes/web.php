<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\FoundationController;
use App\Http\Controllers\HomeController;

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

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/checkuniqueness', [RegisteredUserController::class, 'checkUsernameEmailDuplicate']);



//announcements
Route::get('/announcement', function () { 
    return view('announcements.announcement');
});

// Route::get('/announcementList', function () { 
//     return view('announcements.announcementList');
// });
Route::get('/announcementList', [AnnouncementController::class, 'showAnnouncement']);
Route::get('/myannouncement', [AnnouncementController::class, 'myAnnouncement']);
Route::get('/memberAnnouncements', [AnnouncementController::class, 'memberAnnouncements']);


Route::get('/createannouncement/{id?}', [AnnouncementController::class, 'addoreditAnnouncement']);
Route::post('/createannouncement/{id?}', [AnnouncementController::class, 'createAnnouncement']);

Route::get('/announcementDetail/{id?}', [AnnouncementController::class, 'announcementDetail']);
//Route::get('/announcementBusinessDetail/{id?}', [AnnouncementController::class, 'announcementBusinessDetail']);
Route::post('/checkedAnnouncement', [AnnouncementController::class, 'announcementViewed']);
Route::post('/checkAnnouncementViewers', [AnnouncementController::class, 'checkAnnouncementViewers']);

Route::post('/addInterest', [AnnouncementController::class, 'addAnnouncementInterest']);
Route::post('/announcementcomment', [AnnouncementController::class, 'announcementComment']);

Route::get('/test', function () { 
    return view('test');
});

Route::get('/home',[HomeController::class, 'homepage']) ;

Route::get('/dashboard', function () { 
    return view('landing.dashboard');
});


//contacts
Route::get('/allcontacts', [HomeController::class, 'showAllContacts']);



//foundation
Route::get('/foundation', [FoundationController::class, 'foundationpage']);
Route::get('/aboutfoundation', function () { 
    return view('foundation.aboutFoundation');
});
Route::get('/mediaarchive', function () { 
    return view('foundation.mediaArchive');
});

require __DIR__.'/auth.php';
require __DIR__.'/members.php';
