<?php

namespace App\Http\Controllers;

use App\Vaccine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pet;
use App\User;
use App\Phone;

class VaccineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vaccines = Vaccine::all();
        return view('vetsystem.vaccines.index', compact('vaccines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vetsystem.vaccines.create');
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
            'nombre' =>'required',
        ]);
        $vacuna=new vaccine;
        $vacuna->name=$request->nombre;
        $vacuna->save();

        // Session::flash('secondBackUrl', url()->previous());
        // $backUrl = session('secondBackUrl') ?? url()->previous();
        // return redirect()->route('vaccine.index')->with('success','Vacuna creada con éxito');
        // return redirect($backUrl)->with('success','Vacuna creada con éxito');

        return redirect()->back()->with('success','Vacuna creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function show(vaccine $vaccine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function edit(vaccine $vaccine)
    {
        return view('vetsystem.vaccines.edit', compact('vaccine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nombre' =>'required',
        ]);

        $vacuna=Vaccine::find($id);
        $vacuna->name=$request->nombre;
        $vacuna->save();

        return redirect()->route('vaccine.index')->with('success','Actualización exitosa.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacuna = Vaccine::find($id)->delete();
        return back()->with('success', 'Vacuna eliminada correctamente');
    }
}
