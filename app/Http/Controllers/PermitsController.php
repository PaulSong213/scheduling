<?php

namespace App\Http\Controllers;

use App\Models\Permits;
use Illuminate\Http\Request;

class PermitsController extends Controller
{
  
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:official');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        return view('permits.index');
    }
}
