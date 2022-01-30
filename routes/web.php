<?php

use Illuminate\Support\Facades\Route;

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
});

Route::get('/success', [App\Http\Controllers\DonacionController::class, 'success'])->name('success');
Route::get('/failure', [App\Http\Controllers\DonacionController::class, 'failure'])->name('failure');
Route::get('/pending', [App\Http\Controllers\DonacionController::class, 'pending'])->name('pending');

Route::post('/enviar', [App\Http\Controllers\DonacionController::class, 'store'])->name('enviar');

//Route::post('/enviar','App\Http\Controllers\DonacionController@store');
Route::post('/check', [App\Http\Controllers\DonacionController::class, 'check'])->name('check');
//Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
