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
    public function __construct()
    {
        $this->middleware('admin', [
            'only' => [
                'autoadm',
                'dash',

            ]
        ]);
    }
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
        $Appointments=Appointment::with('dateTimes.date','vet.user','state')->get();
        // $DateTimes = DateTime::with('time','date','appointments')->get();
        // $Specialties=Specialty::with('vet');

        // return view('pagesystem.system.onepage.schedule', compact('Appointments','Specialties','DateTimes'));
        return view('pagesystem.system.onepage.schedule', compact('Appointments'));

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
    public function clinica(){
        return view('vetsystem.index');
    }
    public function eleccion()
    {
        return view('Home.index');
    }
}
