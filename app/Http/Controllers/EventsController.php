<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventsController extends Controller
{
   


    public function __construct()
    {
        $this->middleware('auth:official');
    }

    public function index()
    {
        return view('events.index');
    }
}
