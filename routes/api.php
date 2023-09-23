<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\HubController;
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

    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('user', [AuthController::class, 'user']);
});

// New group for auth middleware
Route::group(['middleware' => 'jwtAuth'], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/management', [AdminController::class, 'management'])->name('management');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');

    //locations
    Route::post('/locations/delete', [LocationController::class, 'delete'])->name('locations.delete');
    Route::post('/locations/update', [LocationController::class, 'update'])->name('locations.update');
    Route::post('/locations/create', [LocationController::class, 'create'])->name('locations.create');
    Route::get('/locations', [LocationController::class, 'index'])->name('locations.index');
    Route::get('/locations/mylocations', [LocationController::class, 'myLocations'])->name('locations.mylocations');
    //Route::resource('hubs', HubController::class);
});
