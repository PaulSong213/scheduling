<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

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
        return view('user.globelabSuccess');
    }

    public function store(Request $request)
    {

       
    }
}
