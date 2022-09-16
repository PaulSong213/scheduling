<?php

namespace App\Http\Controllers;

use App\Models\Officials;
use App\Http\Requests\StoreOfficialsRequest;
use App\Http\Requests\UpdateOfficialsRequest;
use Illuminate\Support\Facades\DB;

class OfficialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $officials = DB::table('officials')
            ->join('users', 'officials.user_id', '=', 'users.id')
            ->select('officials.position', 'users.*')
            ->get();
        return view('officials/index')->with('officials', $officials);
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $officials = DB::table('officials')
        ->join('users', 'officials.user_id', '=', 'users.id')
        ->select('officials.position', 'users.*')
        ->get();
    return view('officials/index')->with('officials', $officials);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOfficialsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOfficialsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Officials  $officials
     * @return \Illuminate\Http\Response
     */
    public function show(Officials $officials)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Officials  $officials
     * @return \Illuminate\Http\Response
     */
    public function edit(Officials $officials)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOfficialsRequest  $request
     * @param  \App\Models\Officials  $officials
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOfficialsRequest $request, Officials $officials)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Officials  $officials
     * @return \Illuminate\Http\Response
     */
    public function destroy(Officials $officials)
    {
        //
    }
}
