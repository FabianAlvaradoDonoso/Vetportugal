<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vet;
use App\User;
use App\Phone;
use App\Specialty;
use App\Role;
use Illuminate\Support\Facades\DB;

class VetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vets = Vet::with('user', 'phone', 'specialties')->get();
        // dd($vets);
        return view('vetsystem.vet.index', compact('vets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialties = Specialty::all();
        return view('vetsystem.vet.create', compact('specialties'));
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
            'apellido' =>'required',
            'email' =>'required|string|email|max:255|unique:users',
            // 'contraseña' =>'required|string|min:6|confirmed',
            'telefono' =>'required|string|max:12',
            'rut' =>'required|string|max:9|unique:vets',
            'especialidades' =>'required',
        ]);

        $usuario=User::create([
            'name' => $request->nombre,
            'role_id' => Role::VET,
            'last_name' => $request->apellido,
            'slug' => str_slug($request->nombre . " " . $request->apellido, '-'),
            'email' => $request->email,
            'password' => bcrypt($request->contraseña), // secret
            'picture' => 'n.a.',
        ]);
        $telefono= Phone::create([      //Llenado de campos en tabla phones
            'landline' => $request->telefono,
            'mobile_phone' => $request->telefono,
        ]);
        $veterinario= Vet::create([      //Llenado de campos en tabla phones
            'rut' => $request->rut,
            'user_id' => $usuario->id,
            'phone_id' => $telefono->id,
        ]);

        foreach($request->especialidades as $especialidad){
            $veterinario->specialties()->attach($especialidad);
        }

        // dd($usuario, $telefono, $veterinario);

        return redirect()->route('vet.index')->with('success','Veterinario creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vet  $vet
     * @return \Illuminate\Http\Response
     */
    public function show(Vet $vet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vet  $vet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vet = Vet::with('user', 'phone', 'specialties')->find($id);
        $specialties = Specialty::all();
        // dd($vet->specialties);
        return view('vetsystem.vet.edit', compact('vet', 'specialties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vet  $vet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nombre' =>'required',
            'apellido' =>'required',
            'email' =>'required|string|email|max:255',
            // 'contraseña' =>'required|string|min:6|confirmed',
            'telefono' =>'required|string|max:12',
            'rut' =>'required|string|max:9',
            'especialidades' =>'required',
        ]);

        $vet = Vet::with('specialties')->find($id);
            $vet->rut = $request->rut;
            $vet->save();

        $phone = Phone::find($vet->phone_id);
            $phone->mobile_phone = $request->telefono;
            $phone->landline = $request->telefono;
            $phone->save();

        $user = User::find($vet->user_id);
            $user->name = $request->nombre;
            $user->last_name = $request->apellido;
            $user->slug = str_slug($request->nombre . " " . $request->apellido, '-');
            $user->email = $request->email;
            $user->password = bcrypt($request->contraseña); // secret
            $user->picture = 'n.a.';
            $user->save();

        foreach($vet->specialties as $specialty){
            DB::table('specialty_vet')->where('id', '=', $specialty->pivot->id)->delete();
        }
        foreach($request->especialidades as $especialidad){
            $vet->specialties()->attach($especialidad);
        }

        return redirect()->route('vet.index')->with('success','Veterinario modificado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vet  $vet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vet $vet)
    {
        //
    }
}
