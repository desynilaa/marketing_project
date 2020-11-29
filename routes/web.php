<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\UserController;
// use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|------------------------- -------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
// Route::get('/testing', function () {
//     return view('testing');
// });

Route::get('/monitoring/input', [MonitoringController::class, 'create'])->middleware('auth');
Route::post('/monitoring/store', [MonitoringController::class, 'store']);
Route::get('/monitoring/index', [MonitoringController::class, 'index'])->middleware('auth');
Route::get('/monitoring/delete/{id}', [MonitoringController::class, 'destroy']);

Route::get('/pengguna/input', [UserController::class, 'create'])->middleware('auth');
Route::post('/pengguna/store', [UserController::class, 'store']);
Route::get('/pengguna/index', [UserController::class, 'index'])->middleware('auth');
Route::get('/pengguna/delete/{NIK}', [UserController::class, 'destroy']);
Route::get('/pengguna/reset/{NIK}', [UserController::class, 'reset_password']);

Route::get('/ganti-password', [UserController::class, 'page_ganti_password'])->middleware('auth');
Route::post('/save-new-password', [UserController::class, 'ganti_password'])->middleware('auth');

// Route::get('/detail/{id}', [MonitoringController::class, 'show'])->middleware('auth');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
