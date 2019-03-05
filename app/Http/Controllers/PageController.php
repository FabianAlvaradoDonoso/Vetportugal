<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vet;

class PageController extends Controller
{
    public function inicio()
    {
        $vet = Vet::all();
        return view('pagesystem.system.onepage.index');
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
    public function clinica(){
        return view('vetsystem.index');
    }
    public function eleccion()
    {
        return view('Home.index');
    }







}
