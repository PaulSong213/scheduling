<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Officials;
use App\Models\User;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = "/request";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        //$this->middleware('guest:official')->except('logout');
    }

    public function multiLogin(Request $request)
    {

        if ($res = Auth::guard('official')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], true )) {
            $official = new Officials($request->all());
            //log in if official
            $request->session()->regenerate();
            //Auth::guard('official')->login($official);
            Auth::setUser($official);
            return redirect()->intended('/home');
            die();
        } else if (Auth::guard('web')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], true )) {
            // user log in
            $user = new User($request->all());
            $request->session()->regenerate();
            //Auth::guard('web')->login($user);
            Auth::setUser($user);
            return redirect()->intended('/request');
            die();
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logoutOfficial(){
        Auth::guard('official')->logout();
        return redirect('/login');
    }

}
