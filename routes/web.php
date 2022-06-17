<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SiswaControllers;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CatatanController;
use App\Models\catatan;
use App\Models\Siswa;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'autentikasi'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/home', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/catatan', [DashboardController::class, 'catatan'])->middleware('auth');
Route::get('/buat', [DashboardController::class, 'buat'])->middleware('auth');

Route::resource('catat', CatatanController::class);