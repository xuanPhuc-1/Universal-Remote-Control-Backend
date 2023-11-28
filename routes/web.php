<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManagerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\HubController;
use App\Http\Controllers\DevicesController;
use App\Http\Controllers\DeviceCategoryController;

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
    Route::get('/admin/user/search', [UserController::class, 'search'])->name('users.search');
    //Set role to user
    Route::post('/admin/user/setRole/{id}', [UserController::class, 'setRole'])->name('users.setRole');

    //Location Action
    Route::get('/admin/location', [LocationController::class, 'index'])->name('admin.locations.index');
    Route::get('/admin/location/create', [LocationController::class, 'create'])->name('admin.locations.create');
    Route::post('/admin/location/store', [LocationController::class, 'store'])->name('admin.locations.store');
    Route::get('/admin/location/edit/{id}', [LocationController::class, 'edit'])->name('admin.locations.edit');
    Route::post('/admin/location/update/{id}', [LocationController::class, 'update'])->name('admin.locations.update');
    Route::post('/admin/location/delete', [LocationController::class, 'destroy'])->name('admin.locations.destroy');

    //Hub Action
    Route::get('/admin/hub', [HubController::class, 'index'])->name('admin.hubs.index');
    Route::get('/admin/hub/create', [HubController::class, 'create'])->name('admin.hubs.create');
    Route::post('/admin/hub/store', [HubController::class, 'store'])->name('admin.hubs.store');
    Route::get('/admin/hub/edit/{id}', [HubController::class, 'edit'])->name('admin.hubs.edit');
    Route::post('/admin/hub/update/{id}', [HubController::class, 'update'])->name('admin.hubs.update');
    Route::post('/admin/hub/delete', [HubController::class, 'destroy'])->name('admin.hubs.destroy');

    //Device Category Action
    Route::get('/admin/device-category', [DeviceCategoryController::class, 'index'])->name('admin.device-category.index');
    Route::get('/admin/device-category/create', [DeviceCategoryController::class, 'create'])->name('admin.device-category.create');
    Route::post('/admin/device-category/store', [DeviceCategoryController::class, 'store'])->name('admin.device-category.store');
    Route::get('/admin/device-category/edit/{id}', [DeviceCategoryController::class, 'edit'])->name('admin.device-category.edit');
    Route::post('/admin/device-category/update/{id}', [DeviceCategoryController::class, 'update'])->name('admin.device-category.update');
    Route::post('/admin/device-category/delete', [DeviceCategoryController::class, 'destroy'])->name('admin.device-category.destroy');

    //Device Action
    Route::get('/admin/device', [DevicesController::class, 'index'])->name('admin.devices.index');
    Route::get('/admin/device/create', [DevicesController::class, 'create'])->name('admin.devices.create');
    Route::post('/admin/device/store', [DevicesController::class, 'store'])->name('admin.devices.store');
    Route::get('/admin/device/edit/{id}', [DevicesController::class, 'edit'])->name('admin.devices.edit');
    Route::post('/admin/device/update/{id}', [DevicesController::class, 'update'])->name('admin.devices.update');
    Route::post('/admin/device/delete', [DevicesController::class, 'destroy'])->name('admin.devices.destroy');
});
