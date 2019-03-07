<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specialty;
use App\Breed;

class SpecialtyController extends Controller
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
        $specialties = Specialty::all();
        return view('vetsystem.specialty.index', compact('specialties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breeds = Breed::all();
        return view('vetsystem.specialty.create', compact('breeds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        $this->validate($request,[
            'nombre' =>'required',
        ]);


        $specialty = Specialty::where('name', '=', $request->nombre)->get();
        if($specialty->isEmpty()){
            $specialties = new Specialty;
            $specialties->name = $request->nombre;
            $specialties->save();

            return redirect()->route('specialty.index')->with('success','Especialidad creada con éxito');
        }else{
            return redirect()->route('specialty.index')->with('error','Especialidad ya existe en el sistema. Intente otro nombre.');
        }

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
    public function edit(Specialty $specialty)
    {
        return view('vetsystem.specialty.edit', compact('specialty'));
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
            'nombre' =>'required',
        ]);

        $specialty = Specialty::where('name', '=', $request->nombre)->get();
        if($specialty->isEmpty()){
            $specialties = Specialty::find($id);
            $specialties->name = $request->nombre;
            $specialties->save();

            return redirect()->route('specialty.index')->with('success','Especialidad modificada con éxito');
        }else{
            return redirect()->route('specialty.index')->with('error','Especialidad ya existe en el sistema. Intente otro nombre.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $specialties = Specialty::find($id)->delete();
        return redirect()->route('specialty.index')->with('success','Especialidad eliminada con éxito');
    }
}
