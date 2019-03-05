<?php

namespace App\Http\Controllers;

use App\Pet;
use App\User;
use App\Breed;
use Illuminate\Http\Request;
use App\Type;

class PetController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        setlocale(LC_TIME, 'Spanish');
    }

    public function index()
    {
        $pets = Pet::with('client.user', 'breed', 'gender', 'vets.user')->get();
        // dd($pets->first()->vets->first());
        return view('vetsystem.pets.index', compact('pets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $types = Type::all();
        return view('vetsystem.pets.create', compact('users', 'types'));
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
            'mascota'   =>'required',
            'cliente'   =>'required',
            'especie'   =>'required',
            'raza'   =>'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pet = Pet::with('client.user', 'breed.type', 'client.address.city', 'client.address.commune', 'client.phone', 'gender', 'vaccines', 'vets.user', 'exampets.exam')
            ->find($id);
        // dd($pet);
        return view('vetsystem.pets.show', compact('pet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function edit(Pet $pet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pet $pet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pet $pet)
    {
        //
    }
}
