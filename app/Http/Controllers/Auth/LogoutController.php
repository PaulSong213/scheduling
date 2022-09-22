<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Officials;
use App\Models\User;
class LogoutController extends Controller
{

    public function logoutOfficial(){
        Auth::guard('official')->logout();
        return redirect('/');
    }

}
