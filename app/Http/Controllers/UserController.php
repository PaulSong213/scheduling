<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Auth;
use App\Rules\Filename;
use Illuminate\Support\Facades\Hash;
use Twilio\Rest\Client;
class UserController extends Controller
{
    public $sid    = "AC0ee01350a558384959c64af938e2d4ca"; 
    public $token  = "4e272864a7cb41c73cd9c47873b9b92a"; 

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
            'email' => 'required|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $request->proof_id_filename->storeAs('public', $proof_id_full);
        $request->profile_filename->storeAs('public', $profile_full);

        $complete_phone_number = "+63".$request->input('cellphone_number');

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

        Auth::login($new_user);

        return redirect('/home');
    }

    public function residentRegister()
    {
        if (Auth::check()) {
            return redirect('/home');
            die();
        }
        return view('user.residentRegister');
    }

}
