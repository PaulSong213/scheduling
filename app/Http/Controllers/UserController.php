<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Rules\Filename;
use Illuminate\Support\Facades\Hash;
use Twilio\Rest\Client;

class UserController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function show()
    {
        return view('home');
    }

    public function randText($len = 20)
    {
        $str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $txt = "";
        for ($i = 0; $i < $len; $i++) {
            $txt .= substr($str, rand(0, strlen($str)), 1);
        }
        return $txt;
    }

    public function residentRegisterCreate(Request $request)
    {
        if (Auth::check()) {
            return redirect('/home');
            die();
        }

        $arr_proof_id = explode(".", $request->proof_id_filename->getClientOriginalName());
        $arr_profile =  explode(".", $request->profile_filename->getClientOriginalName());

        $proof_id_filename_ext = $arr_proof_id[1];
        $profile_filename_ext = $arr_profile[1];

        $request['proof_id_filename_title'] = $this->randText();
        $request['profile_filename_title'] = $this->randText();

        $proof_id_full = $request['proof_id_filename_title'] . '.' . $proof_id_filename_ext;
        $profile_full = $request['profile_filename_title'] . '.' . $profile_filename_ext;


        //files should not have dot characters
        if (sizeof(explode(".", $request->proof_id_filename->getClientOriginalName())) > 2) {
            return back()
                ->with('error', 'Image ID should not have "." (dot) character.')
                ->withInput();
        }

        if (sizeof(explode(".", $request->profile_filename->getClientOriginalName())) > 2) {
            return back()
                ->with('error', 'Image profile should not have "." character.')
                ->withInput();
        }

        $validated = $request->validate([
            'email' => 'required|unique:users|unique:officials',
            'password' => 'required|confirmed|min:6',
        ]);

        $request->proof_id_filename->storeAs('public', $proof_id_full);
        $request->profile_filename->storeAs('public', $profile_full);

        $complete_phone_number = "+63" . $request->input('cellphone_number');

        $new_user = User::create([
            'cellphone_number' => $complete_phone_number,
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'birthdate' => $request->input('birthdate'),
            'address' => $request->input('address'),
            'password' => Hash::make($request->input('password')),
            'proof_id_filename' => $proof_id_full,
            'profile_filename' => $profile_full,
        ]);

        //log in if official
        // if (Auth::guard('official')->attempt(['email' => $request->input('email'), 'password' => $request->input('password') ], $request->get('remember'))) {
        //     Auth::guard('official')->login($new_user);
        //     return redirect()->intended('/home');
        //     die();
        // }
        
        Auth::guard('web')->login($new_user);
        return redirect()->intended('/request');
    }

    public function residentRegister()
    {
        if (Auth::guard('web')->check()) {
            return redirect('/request');
            die();
        }else if(Auth::guard('official')->check()){
            return redirect('/home');
            die();
        }
        return view('user.residentRegister');
    }
}
