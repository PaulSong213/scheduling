<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OfficialsController;
use Illuminate\Support\Facades\Hash;
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
Route::any('/testing', function (Request $request) {
    $request['proof_id_filename_title'] = explode(".",$request->proof_id_filename->getClientOriginalName())[0];

    if(sizeof(explode(".",$request->proof_id_filename->getClientOriginalName()) ) > 2 ){
        return back()
            ->with('error','Filenames should not have "." character.')
            ->withInput();
    }

    // $validated = $request->validate([
    //     'proof_id_filename_title' => 'required|alpha_dash'
    // ]);


    $request->proof_id_filename->storeAs('public', $request->proof_id_filename->getClientOriginalName());
    $row = new User;
    $row->first_name = $request->input('first_name');
    $row->email = $request->input('email');
    $row->last_name = $request->input('last_name');
    $row->password =  Hash::make($request->input('last_name'));

    $row->save();
    return back()->with('success', 'File Created Successfully!');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');