<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AuthManagerController;
use App\Http\Controllers\AdminController;
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

Route::get('/public', [PublicController::class, 'index'])->name('public.index');
Route::get('/login', [AuthManagerController::class, 'login'])->name('login');
Route::post('/login', [AuthManagerController::class, 'loginPost'])->name('login.post');
Route::get('/register', [AuthManagerController::class, 'register'])->name('register');
Route::post('/register', [AuthManagerController::class, 'registerPost'])->name('register.post');
Route::get('/logout', [AuthManagerController::class, 'logout'])->name('logout');
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
