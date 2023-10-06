<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManagerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\HubController;
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
    return view('welcome');
})->name('welcome');



// Web middleware
// Route::group(['middleware' => 'web'], function () {
//     Route::get('/login', [AuthManagerController::class, 'login'])->name('login');
//     Route::post('/login', [AuthManagerController::class, 'authenticate'])->name('login.post');
//     Route::get('/register', [AuthManagerController::class, 'register'])->name('register');
//     Route::post('/register', [AuthManagerController::class, 'registerPost'])->name('register.post');
//     Route::get('/logout', [AuthManagerController::class, 'logout'])->name('logout');


//     // New group for auth middleware
//     Route::group(['middleware' => 'auth'], function () {
//         Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
//         Route::get('/admin/management', [AdminController::class, 'management'])->name('management');
//         Route::get('/admin/profile', [AdminController::class, 'profile'])->name('profile');
//         Route::resource('locations', LocationController::class);
//         Route::resource('hubs', HubController::class);
//     });
// });
