<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonitoringController;

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
    return view('layouts.master');
});
Route::get('/testing', function () {
    return view('testing');
});
Route::get('/home', function () {
    return view('welcome');
});

Route::get('/monitoring/input', [MonitoringController::class, 'create']);
Route::post('/monitoring/store', [MonitoringController::class, 'store']);
Route::get('/monitoring/index', [MonitoringController::class, 'index']);