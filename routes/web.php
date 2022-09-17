<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OfficialsController;
use App\Models\User;
use Illuminate\Http\Request;

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


Route::resource('user', UserController::class);
Route::resource('officials', OfficialsController::class);

//costum pages
Route::get('/smsRedirect', [App\Http\Controllers\UserController::class, 'smsRedirect'])->name('SMS Redirect');
Route::get('/globelabSuccess/{access_token}/{subscriber_number}', [App\Http\Controllers\UserController::class, 'globelabSuccess'])->name('globelabSuccess');
Route::get('/globelabSave', [App\Http\Controllers\UserController::class, 'globelabSave'])->name('globelabSave');
Route::get('/residentRegister',  [App\Http\Controllers\UserController::class, 'residentRegister'])->name('residentRegister');
Route::post('/residentRegisterCreate',  [App\Http\Controllers\UserController::class, 'residentRegisterCreate'])->name('residentRegisterCreate');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


