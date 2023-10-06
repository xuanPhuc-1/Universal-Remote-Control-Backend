<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\HubController;
use App\Http\Controllers\Api\DeviceController;
use App\Http\Controllers\Api\DeviceCategoryController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/data', App\Http\Controllers\DataController::class);

Route::post('login', [AuthController::class, 'login']);

Route::namespace('Api')->group(function () {

    Route::post('login', [AuthController::class, 'login'])->name('login.post');
    Route::get('login', [AuthController::class, 'loginGet'])->name('login.get');
    Route::post('signup', [AuthController::class, 'register'])->name('register.post');
    Route::get('signup', [AuthController::class, 'registerGet'])->name('register.get');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('user', [AuthController::class, 'user']);
});

// New group for auth middleware
Route::group(['middleware' => 'jwtAuth'], function () {
    //Admin
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/management', [AdminController::class, 'management'])->name('management');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');

    //User 
    Route::post('/save_user_info', [AuthController::class, 'saveUserInfo'])->name('save_info');

    //Location
    Route::post('/locations/create', [LocationController::class, 'create'])->name('locations.create');
    Route::get('/locations', [LocationController::class, 'index'])->name('locations.index');

    //Hub
    Route::post('/hubs/pick', [HubController::class, 'pick'])->name('hubs.pick');

    //Device Category
    Route::post('/device_categories/create', [DeviceCategoryController::class, 'create'])->name('device_categories.create');
    Route::get('/device_categories', [DeviceCategoryController::class, 'index'])->name('device_categories.index');
    Route::get('/device_categories/{id}/get_command_parameters', [DeviceCategoryController::class, 'getCommandParameters'])->name('device_categories.get_command_parameters');

    //Device 
    Route::post('/devices/create', [DeviceController::class, 'create'])->name('devices.create');
    Route::get('/devices', [DeviceController::class, 'index'])->name('devices.index');
});
