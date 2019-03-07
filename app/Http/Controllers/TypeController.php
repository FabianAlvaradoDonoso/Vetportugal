<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;
use PDF;

class TypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function generatePDF()
    {
        $types = Type::all();
        $title = 'Welcome to HDTuto.com';
        $pdf = PDF::loadView('vetsystem.PDF.myPDF', ['title' => $title, 'types' => $types]);

        // return $pdf->download('itsolutionstuff.pdf');
        return view('vetsystem.PDF.myPDF', compact('title', 'types'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        return view('vetsystem.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vetsystem.types.create');
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
        $type=new Type;
        $type->name=$request->nombre;
        $type->save();
        return redirect()->route('type.index')->with('success','Especie creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('vetsystem.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nombre' =>'required',
        ]);

        $type=Type::find($id);
        $type->name=$request->nombre;
        $type->save();

        return redirect()->route('type.index')->with('success','Actualización exitosa.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Type::find($id)->delete();
        return back()->with('success', 'Especie eliminada correctamente');
    }
}
