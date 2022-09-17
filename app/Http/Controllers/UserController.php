<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Auth;
use App\Rules\Filename;
use Illuminate\Support\Facades\Hash;

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

    /**
     *  Redirect users to globelab registration page
     */
    public function smsRedirect()
    {
        return view('user.smsRedirect');
    }

    /**
     * Request phone number and access token to Globelab which contains a parameter of CODE
     */
    public function globelabSave()
    {
        //header('Access-Control-Allow-Origin:  *');

        return view('user.globelabSave');
    }

    /**
     * Grab the users phone number and access token then save to Database
     */
    public function globelabSuccess($access_token, $subscriber_number)
    {
        $user_id = Auth::id();
        DB::table('users')
            ->where('id', $user_id)
            ->update([
                'globe_access_token' => $access_token,
                'globe_subscriber_number' => $subscriber_number,
            ]);
        return view('user.globelabSuccess')
            ->with('access_token',$access_token)
            ->with('subscriber_number',$subscriber_number)
            ;
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
            'proof_id_filename_title' => [
                'required',
                'alpha_dash', // This is your custom rule
            ],
            'profile_filename_title' => [
                'required',
                'alpha_dash', // This is your custom rule
            ],
        ]);

        $request->proof_id_filename->storeAs('public', $proof_id_full);
        $request->profile_filename->storeAs('public', $profile_full);

        $new_user = User::create([
            'first_name' => $request->input('first_name'),
            'email' => $request->input('email'),
            'last_name' => $request->input('last_name'),
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

    public function verifyPhoneNumber(){
        if(!Auth::user()->globe_access_token || !Auth::user()->globe_subscriber_number ){
            return redirect('/smsRedirect');
            die();
        }
    }

    
}
