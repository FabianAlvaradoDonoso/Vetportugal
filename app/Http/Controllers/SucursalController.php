<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreSucursalRequest;
use App\Sucursal;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Sucursals = Sucursal::all();
        return view('pagesystem.Sucursal.index', compact('Sucursals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pagesystem.Sucursal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSucursalRequest $request)
    {
        $Sucursal = new Sucursal();
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/vetportugal/images/', $name);
        }

        $Sucursal->name = $request->input('name');
        $Sucursal->adress = $request->input('adress');
        $Sucursal->phone = $request->input('phone');
        $Sucursal->cellphone = $request->input('cellphone');
        $Sucursal->description = $request->input('description');
        $Sucursal->imagen = $name;
        $Sucursal->maplink = $request->input('maplink');
        $Sucursal->mail = $request->input('mail');
        $Sucursal->youtubevideo = $request->input('youtubevideo');
        $Sucursal->slug = time().$request->input('name');

        $Sucursal->save();
        $Sucursals = Sucursal::all();
        return redirect()->route('Sucursal.index')->with('success', 'Sucursal creada Exitosamente');        
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
    public function edit(Sucursal $Sucursal)
    {
        return view('pagesystem.Sucursal.edit', compact('Sucursal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sucursal $Sucursal)
    {
        $Sucursal->fill($request->except('imagen'));
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/vetportugal/images', $name);
            $Sucursal->imagen = $name;
        }

        $Sucursal->save();
        return redirect()->route('Sucursal.index')->with('success', 'Actualización exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sucursal $Sucursal)
    {
        $file_path = public_path().'/vetportugal/images/'.$Sucursal->imagen;
        \File::delete($file_path);
        $Sucursal->delete();

        return redirect()->route('Sucursal.index')->with('success', 'Eliminación Exitosa');
    }
}
