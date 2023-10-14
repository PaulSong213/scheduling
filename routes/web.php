<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OfficialsController;
use App\Http\Controllers\RequestController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
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
        ->orderBy('position_level')
        ->get();
    $events = DB::table('events')
        ->select()
        ->orderBy('id', 'asc')
        ->get();

    return view('welcome')
        ->with('officials', $officials)
        ->with('events', $events);
});


Auth::routes();




//costum pages
Route::get('/residentRegister',  [\App\Http\Controllers\UserController::class, 'residentRegister'])->name('residentRegister');
Route::post('/residentRegisterCreate',  [\App\Http\Controllers\UserController::class, 'residentRegisterCreate'])->name('residentRegisterCreate');

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/officials', [\App\Http\Controllers\OfficialsController::class, 'index'])->name('officials');
Route::get('/permits', [\App\Http\Controllers\PermitsController::class, 'index'])->name('permits');
Route::get('/events', [\App\Http\Controllers\EventsController::class, 'index'])->name('events');
Route::get('/brgycert', [\App\Http\Controllers\BrgyCertController::class, 'index'])->name('brgycert');
Route::get('/clearance', [\App\Http\Controllers\ClearanceController::class, 'index'])->name('clearance');
Route::get('/id', [\App\Http\Controllers\IDController::class, 'index'])->name('id');

Route::get('/twilio/sendSMS/{sms}/{number}/{redirectRoute}', [\App\Http\Controllers\TwilioController::class, 'sendSMS'])
    ->name('sendSMS')
    ->where('redirectRoute', '(.*)');;


//requests
Route::get('/request/credential/{type}', [\App\Http\Controllers\RequestController::class, 'credential'])->name('credential')->whereIn('type', ['Clearance', 'ID', 'Certificate']);;
Route::get('/request/permit', [\App\Http\Controllers\RequestController::class, 'permit'])->name('permit');
Route::post('/request/addCredential',  [\App\Http\Controllers\RequestController::class, 'addCredential'])->name('addCredential');
Route::post('/request/addPermit',  [\App\Http\Controllers\RequestController::class, 'addPermit'])->name('addPermit');

Route::get('/request/success',  function () {
    return view('request.success');
});

//constum auth
Route::post('/multiLogin',  [\App\Http\Controllers\Auth\LoginController::class, 'multiLogin'])->name('multiLogin');
Route::post('/logoutOfficial',  [\App\Http\Controllers\Auth\LogoutController::class, 'logoutOfficial'])->name('logoutOfficial');




//default routes
Route::resource('user', UserController::class);
Route::resource('officials', OfficialsController::class);
Route::resource('request', RequestController::class);
