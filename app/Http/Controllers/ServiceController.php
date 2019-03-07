<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Http\Requests\StoreServiceRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Services = Service::all();
        return view('pagesystem.Service.index', compact('Services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pagesystem.Service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request)
    {
        $Service = new Service();
        if($request->hasFile('imagen'))
        {
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $Service->imagen = $name;
            $file->move(public_path().'/vetportugal/images/', $name);
        }

        $Service->name = $request->input('name');
        $Service->description = $request->input('description');
        $Service->active = $request->input('name');
        $Service->price = $request->input('price');
        $Service->slug = time().$request->input('name');

        $Service->save();

        return redirect()->route('Service.index')->with('success', 'Creación Exitosa');
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
    public function edit(Service $Service)
    {
       
       return view('pagesystem.Service.edit', compact('Service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $Service)
    {
        $Service->fill($request->except('imagen'));
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/vetportugal/images', $name);
            $Service->imagen = $name;
        }

        $Service->save();
        return redirect()->route('Service.index')->with('success', 'Actualización exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $Service)
    {
        $file_path = public_path().'/vetportugal/images/'.$Service->imagen;
        \File::delete($file_path);
        $Service->delete();

        return redirect()->route('Service.index')->with('success', 'Eliminación Exitosa');
    }
}
