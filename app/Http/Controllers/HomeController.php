<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Credentials;
use App\Models\Permits;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        $credentials = DB::table('credentials')
            ->join('users', 'credentials.user_id', '=', 'users.id')
            ->select('credentials.*', 'users.*')
            ->where('credentials.status', '!=', 'pending')
            ->get();
        $permits = DB::table('permits')
        ->join('users', 'users.id', '=', 'permits.user_id')
        ->where('permits.status', '!=', 'pending')
        ->get();
        return view('home')
            ->with('credentials', $credentials)
            ->with('permits', $permits);
    }
    public function __construct()
    {
        $this->middleware('auth:official');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
  
}
