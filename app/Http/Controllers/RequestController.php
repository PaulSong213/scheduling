<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    //
    public function credential($type)
    {
        return view('request.credential')
            ->with('type', $type);
    }

    public function permit()
    {
        return view('request.credential');
    }
}
