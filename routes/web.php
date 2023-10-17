<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManagerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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



//Web middleware
Route::group(['middleware' => 'web'], function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Route::get('/admin', [AuthManagerController::class, 'login'])->name('login');
    Route::post('admin/login', [AuthManagerController::class, 'authenticate'])->name('admin.loginPost');
    Route::get('admin/register', [AuthManagerController::class, 'register'])->name('admin.register');
    Route::post('admin/register', [AuthManagerController::class, 'registerPost'])->name('admin.registerPost');

    //Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
});

//admin action
Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/management', [AdminController::class, 'management'])->name('management');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('profile');
    Route::get('/logout', [AuthManagerController::class, 'logout'])->name('admin.logout');

    //User Action
    Route::get('/admin/user', [UserController::class, 'index'])->name('user.index');
});
