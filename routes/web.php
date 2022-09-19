<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OfficialsController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    $officials = DB::table('officials')
        ->join('users', 'officials.user_id', '=', 'users.id')
        ->select('officials.*', 'users.*')
        ->orderBy('position_level')
        ->get();
    return view('welcome')
        ->with('officials', $officials);
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
<<<<<<< HEAD
Route::get('/officials', [App\Http\Controllers\OfficialsController::class, 'index'])->name('officials');
Route::get('/permits', [App\Http\Controllers\PermitsController::class, 'index'])->name('permits');
Route::get('/events', [App\Http\Controllers\EventsController::class, 'index'])->name('events');
=======
Route::get('/twilio/sendSMS/{sms}/{number}', [App\Http\Controllers\TwilioController::class, 'sendSMS'])->name('sendSMS');
>>>>>>> 306a94bbf676d5bda8b8dd3d89dbec5a7804d26b
