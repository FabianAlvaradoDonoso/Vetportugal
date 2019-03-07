<?php

namespace App\Http\Controllers;

use App\Cage;
use Illuminate\Http\Request;

class CageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('specialty.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cage  $cage
     * @return \Illuminate\Http\Response
     */
    public function show(Cage $cage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cage  $cage
     * @return \Illuminate\Http\Response
     */
    public function edit(Cage $cage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cage  $cage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cage $cage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cage  $cage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cage $cage)
    {
        //
    }
}
