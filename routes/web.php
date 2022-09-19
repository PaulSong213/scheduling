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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/officials', [App\Http\Controllers\OfficialsController::class, 'index'])->name('officials');
Route::get('/permits', [App\Http\Controllers\PermitsController::class, 'index'])->name('permits');
Route::get('/events', [App\Http\Controllers\EventsController::class, 'index'])->name('events');