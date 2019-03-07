<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendemail(Request $request){
        Mail::to('felipe.fuentesg@utem.cl')->send(new ContactMail($request));
    } 

    public function envia(Request $request){
        return view('pagesystem.system.layouts.envia', compact('request'));
    }
}
