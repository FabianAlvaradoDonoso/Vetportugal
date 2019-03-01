<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vet;
use App\Doc;
use App\Carousel;
use App\Sucursal;
use App\Service;
use App\Specialty;
use App\User;
use App\Appointment;
use App\Date;
use App\Time;
use App\DateTime;

class PageController extends Controller
{
    public function inicio()
    {
        $Docs = Doc::all();
        $Carousels = Carousel::all();
        $Sucursals = Sucursal::all();
        $Services = Service::all();
        $Users = User::all();
        return view('pagesystem.system.onepage.index', compact('Docs','Carousels','Sucursals','Services','Users'));
    }
  
    public function schedule()
    {
        /*$Appointments=Appointment::with('dateTime')->get();*/
        $Appointments=Appointment::with('dateTime','vet','user','state')->get();
        $DateTimes = DateTime::with('time','date','appointment')->get();
        $Specialties=Specialty::with('vet');

        
        return view('pagesystem.system.onepage.schedule', compact('Appointments','Specialties','DateTimes'));
        
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
