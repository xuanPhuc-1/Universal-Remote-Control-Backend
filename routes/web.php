<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManagerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocationController;

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
Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/management', [AdminController::class, 'management'])->name('management');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('profile');
    Route::get('/logout', [AuthManagerController::class, 'logout'])->name('admin.logout');

    //User Action
    Route::get('/admin/user', [UserController::class, 'index'])->name('users.index');
    Route::get('/admin/user/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/admin/user/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/admin/user/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/admin/user/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::post('/admin/user/delete', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/admin/user/show/{id}', [UserController::class, 'showLocation'])->name('users.showLocation');

    //Location Action
    Route::get('/admin/location', [LocationController::class, 'index'])->name('admin.locations.index');
    Route::get('/admin/location/create', [LocationController::class, 'create'])->name('admin.locations.create');
    Route::post('/admin/location/store', [LocationController::class, 'store'])->name('admin.locations.store');
    Route::get('/admin/location/edit/{id}', [LocationController::class, 'edit'])->name('admin.locations.edit');
    Route::post('/admin/location/update/{id}', [LocationController::class, 'update'])->name('admin.locations.update');
    Route::post('/admin/location/delete', [LocationController::class, 'destroy'])->name('admin.locations.destroy');
});
