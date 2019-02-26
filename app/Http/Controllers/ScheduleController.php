<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet;
use App\User;
use App\Phone;
use App\Vaccine;
use App\Client;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $phones = Phone::all();
        $pets = Pet::with('gender', 'breed', 'type', 'vaccines', 'client.user', 'vets')->get();
        // dd($pets->first()->vets);
        return view('vetsystem.schedule.index', compact('pets', 'users', 'phones'));
    }

    public function getPets(Request $request, $id){
        if($request->ajax()){
            $pets = Pet::pets($id);
            return response()->json($pets);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pets = Pet::with('vaccines', 'client')->get();
        $users = User::all();
        $phones = Phone::all();
        $vaccines = Vaccine::all();
        return view('vetsystem.schedule.create', compact('vaccines', 'pets', 'users', 'phones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'cliente'   =>'required',
            'mascota'   =>'required',
            'dia'       =>'required',
            'hora'      =>'required',
            'vacuna'    =>'required',
        ]);

        // dd($request->dia);
        // dd(date('Y-m-d', strtotime($request->dia)));

        $pet = Pet::find($request->mascota);
        $vaccine = Vaccine::find($request->vacuna);
        $pet->vaccines()->attach($vaccine, array(
            'scheduled_date' => date('Y-m-d', strtotime($request->dia)),
            'scheduled_time' => $request->hora));
        return redirect()->route('schedule.index')->with('success','Cita creada con éxito');
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

        $res = DB::table('pets_vaccines')->where('id', '=', $id)->first();
        $vaccines = Vaccine::all();
        $pet = Pet::find($res->pet_id);
        $petsalls = Pet::all();
        $client = Client::find($pet->client_id);
        $users = User::where('role_id', '=', '3')->get();
        // dd($users);

        return view('vetsystem.schedule.edit', compact('res', 'users', 'vaccines', 'pet','petsalls', 'client'));
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
        $this->validate($request,[
            'cliente'   => 'required',
            'mascota'   => 'required',
            'vacuna'    => 'required',
            'hora'      => 'required',
            'dia'       => 'required',
            'id'        => 'required',
        ]);

        $res = DB::table('pets_vaccines')->where('id', '=', $id)
            ->update([
                'scheduled_date' => date('Y-m-d', strtotime($request->dia)),
                'scheduled_time' => $request->hora,
                'vaccine_id'     => $request->vacuna,
                'pet_id'         => $request->mascota,
            ]);

        return redirect()->route('schedule.index')->with('success','Cita modificada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $date = DB::table('pets_vaccines')->where('id', '=', $id)->delete();
        return redirect()->route('schedule.index')->with('success','Cita eliminada con éxito');
    }
}
