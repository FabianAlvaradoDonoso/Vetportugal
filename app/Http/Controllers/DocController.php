<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doc;
use App\Http\Requests\StoreDocRequest;

class DocController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Docs = Doc::all();
        return view('pagesystem/Doc.index', compact('Docs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pagesystem/Doc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocRequest $request)
    {
        $Doc = new Doc();
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/vetportugal/images/', $name);
          
        }
        
        $Doc->image = $name; 
        $Doc->specialty = $request->input('specialty');
        $Doc->name = $request->input('name');
        $Doc->description = $request->input('description');
        $Doc->slug = time().$request->input('name');
        $Doc->save();

        $Docs = Doc::all();
        return view('/pagesystem/Doc.index', compact('Docs'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Doc $Doc)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Doc $Doc)
    {
         return view('pagesystem.doc.edit', compact('Doc'));         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doc $Doc)
    {

        $Doc->fill($request->except('imagen'));       
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $Doc->image = $name;
            $file->move(public_path().'/vetportugal/images/', $name);
        }
        $Doc->save();
        return redirect()->route('Docs.index')->with('success','Actualización exitosa.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doc $Doc)
    {
        $file_path = public_path().'/vetportugal/images/'.$Doc->image;
        \File::delete($file_path);
        $Doc->delete();
        return redirect()->route('Docs.index')->with('success','Eliminación exitosa.');
        

    }
    
}
