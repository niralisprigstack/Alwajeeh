<?php

use App\Http\Controllers\ProfileController;
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

//profile and members route

    Route::get('/profile', [ProfileController::class, 'editProfile'])->name('profile.profilepage');
    Route::post('/personaldetails', [ProfileController::class, 'storePersonaldet']);
    Route::post('/professionaldetails', [ProfileController::class, 'storeProfessionaldet']);
    Route::post('/contactdetails', [ProfileController::class, 'storeContactdet']);
    Route::post('/editProfilePic', [ProfileController::class, 'saveProfilePic']);
    
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    



