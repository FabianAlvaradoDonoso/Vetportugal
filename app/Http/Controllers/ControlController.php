<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet;
use App\Vet;
use App\User;
use Illuminate\Support\Facades\DB;

class ControlController extends Controller
{
    public function __construct()
    {
        $this->middleware('vet');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $controls = Pet::with('vets.user', 'client.user')->get();
        // dd($controls);
        return view('vetsystem.control.index', compact('controls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vets = Vet::with('user')->get();
        $users = User::all();
        return view('vetsystem.control.create', compact('vets', 'users'));
    }
    public function create2($id)
    {
        $vets = Vet::with('user')->get();
        $pet = Pet::with('client.user')->where('id', $id)->first();
        // dd($pet);
        $users = User::all();
        return view('vetsystem.control.create2', compact('vets', 'pet', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request,[
            'sintoma'       => 'required',
            'diagnostico'   => 'required',
            'descripcion'   => 'required',
            'veterinario'   => 'required',
            'fecha'         => 'required',
            'mascota'       => 'required',
            'type'       => 'required',
        ]);
        // dd($request->veterinarioID);


        if($request->type == 1){
            $pet = Pet::find($request->mascota);
            $vet = Vet::find($request->veterinario);
            dd($vet);

            $pet->vets()->attach($vet, array(
                'date' => date('Y-m-d', strtotime($request->fecha)),
                'symptom' => $request->sintoma,
                'diagnostic' => $request->diagnostico,
                'description' => $request->descripcion,
                'vet_id' => $request->veterinario,
                'pet_id' => $request->mascota));
            return redirect()->route('control.index')->with('success','Control registrado con éxito');
        }else{
            if($request->type == 2){
                $vet = Vet::where('user_id', $request->veterinarioID)->first();
                $pet = Pet::find($request->mascotaID);
                // dd($pet);

                if($pet != null && $vet != null){
                    $pet->vets()->attach($vet, array(
                        'date' => date('Y-m-d', strtotime($request->fecha)),
                        'symptom' => $request->sintoma,
                        'diagnostic' => $request->diagnostico,
                        'description' => $request->descripcion,
                        'vet_id' => $vet->id,
                        'pet_id' => $request->mascotaID));
                        return redirect()->action('PetController@show', intval($request->mascotaID))
                            ->with('success', 'Control registrado');
                }else{
                    return redirect()->action('PetController@show', intval($request->mascotaID))
                        ->with('errores', 'El usuario no tiene los permisos para realizar la acción o no esta registrado como un veterinario.');
                }
            }
        }


        // dd($vet);

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
        $control = DB::table('pets_vets')->where('id', '=', $id)->first();
        $vets = Vet::with('user')->get();
        $users = User::all();
        $pets = Pet::with('client.user')->find($control->pet_id);
        // dd($control, $pets);
        return view('vetsystem.control.edit', compact('control', 'vets', 'users', 'pets'));
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
            'sintoma'       => 'required',
            'diagnostico'   => 'required',
            'descripcion'   => 'required',
            'veterinario'   => 'required',
            'fecha'         => 'required',
        ]);

        $res = DB::table('pets_vets')->where('id', '=', $id)
            ->update([
                'symptom'       => $request->sintoma,
                'diagnostic'    => $request->diagnostico,
                'description'   => $request->descripcion,
                'date'          => date('Y-m-d', strtotime($request->fecha)),
            ]);

        return redirect()->route('control.index')->with('success','Control modificada con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
