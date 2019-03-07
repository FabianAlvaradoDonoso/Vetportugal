<?php

namespace App\Http\Controllers;

use App\Breed;
use App\Type;
use Illuminate\Http\Request;

class BreedController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function getBreeds(Request $request, $id){
        if($request->ajax()){
            $breeds = Breed::breeds($id);
            return response()->json($breeds);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breeds = Breed::all();
        $types = Type::all();
        return view('vetsystem.breeds.index', compact('breeds', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('vetsystem.breeds.create', compact('types'));
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
            'nombre' => 'required',
            'especie' => 'required',
        ]);

        $breed = new Breed;
        $breed->name = $request->nombre;
        $breed->type_id = $request->especie;
        $breed->save();

        return redirect()->route('breed.index')->with('success','Raza creada con éxito');

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
    public function edit(Breed $breed)
    {
        $types = Type::all();
        return view('vetsystem.breeds.edit', compact('breed', 'types'));
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
            'raza' => 'required',
        ]);

        $breed = Breed::find($id);
        $breed->name = $request->nombre;
        $breed->type_id = $request->raza;
        $breed->save();

        return redirect()->route('breed.index')->with('success','Actualización exitosa.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $breed = Breed::find($id)->delete();
        return back()->with('success', 'Raza eliminada correctamente');
    }
}
