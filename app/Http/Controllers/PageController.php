<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vet;
use App\Doc;
use App\Carousel;
use App\Sucursal;

class PageController extends Controller
{
    public function inicio()
    {
        $Docs = Doc::all();
        $Carousels = Carousel::all();
        $Sucursals = Sucursal::all();
        return view('pagesystem.system.onepage.index', compact('Docs','Carousels','Sucursals'));
    }
  
    public function schedule()
    {
        return view('pagesystem.system.onepage.schedule');
    }
    public function about()
    {
        return view('pagesystem.system.onepage.about');
    }
    public function contact()
    {
        return view('pagesystem.system.onepage.contact');
    }

    public function autoadm()
    {
        return view('pagesystem.welcome');
    }

    public function dash()
    {
        return view('pagesystem.dashboard');
    }






    public function index()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
