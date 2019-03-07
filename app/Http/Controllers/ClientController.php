<?php

namespace App\Http\Controllers;

use App\Address;
use App\City;
use App\Client;
use App\Commune;
use App\Helpers\Helper;
use App\Pet;
use App\Phone;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class ClientController extends Controller
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
        $clients=Client::with('user','address.commune','address.city','phone','pets.gender')->withCount('pets')->get();
        foreach ($clients as $key => $cliente){     //Se recorren todos los cliente y sus mascotas, para contar cuantas veces las mascotas fueron atendidaa
            $visit_count=0;
            foreach ($cliente->pets as $key => $mascota){
                $pets=Pet::where('id',$mascota->id)->withCount('vets')->first();
                $visit_count=$visit_count+$pets->vets_count;
            }
            array_add($cliente,'visit', $visit_count);
        }
        // dd($clients->first()->user);

        return view('vetsystem.client.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vetsystem.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[      //Validaciones
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',    //Unico Email
            'landline' => 'string|max:12|unique:phones',        //Unico telefono
            'mobile_phone' => 'string|max:12|unique:phones',    //Unico celular
            //'password' => 'required|string|min:6|confirmed',    //Comprobación de contraseña y largo
            'image' => 'mimes:jpeg,png|max:2048|dimensions:min_width=350,min_height=600',
            'slug' => 'required|string|unique:users',
        ]);

        $comuna=Commune::where('name',$request->commune)->first();
        $ciudad=City::where('name',$request->city)->first();


        if (!$comuna){      //Si la comuna no existe se crea
            $comuna=Commune::create([
                'name' =>$request->commune,
            ]);
        }

        if (!$ciudad){      //Si la ciudad no existe se crea
            $ciudad=City::create([
                'name' =>$request->city,
            ]);
        }

        $direccion=Address::create([        //Llenado de campos en tabla addresses
            'street' => $request->street,
            'numeration' => $request->numeration,
            'city_id' => $ciudad->id,
            'commune_id' => $comuna->id,
        ]);

        $telefono= Phone::create([      //Llenado de campos en tabla phones
           'landline' => $request->landline,
            'mobile_phone' => $request->mobile_phone,
        ]);

        if ($request->files){       //Si existe una imagen
            $picture= Helper::uploadFile('image', 'users');
            $request->merge(['picture' => $picture]);
        }
        else{
            $request->merge(['image' => null]);
        }

        $usuario=User::create([
            'name' => $request->name,
            'role_id' => Role::CLIENT,
            'last_name' => $request->last_name,
            'slug' => str_slug($request->name . " " . $request->last_name, '-'),
            'email' => $request->email,
            'password' => bcrypt($request->password), // secret
            'picture' => $request->picture,
        ]);


        Client::create([
           'user_id' => $usuario->id,
           'address_id' =>$direccion->id,
           'phone_id' =>$telefono->id,
        ]);

        return redirect()->route('client.index')->with('success','Cliente creado con éxito');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $cliente=$client->user;

        $city=$client->address->city->name;

        $commune=$client->address->commune->name;

        $fijo=$client->phone->landline;
        $movil=$client->phone->mobile_phone;

        $calle=$client->address->street;
        $num=$client->address->numeration;

        $foto=$client->user->picture;


        array_add($cliente,'commune', $commune);
        array_add($cliente,'city', $city);
        array_add($cliente,'landline', $fijo);
        array_add($cliente,'mobile_phone', $movil);
        array_add($cliente,'street', $calle);
        array_add($cliente,'numeration', $num);
        array_add($cliente,'image', $foto);


        return view('vetsystem.client.edit', compact('cliente','direccion','telefono'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $this->validate($request,[      //Validaciones
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$client->user->id , //Unico Email
            'landline' => 'string|max:12|unique:phones,landline,'.$client->phone->id,        //Unico telefono
            'mobile_phone' => 'string|max:12|unique:phones,mobile_phone,'. $client->phone->id,    //Unico celular
            'slug' => 'required|string|unique:users,slug,'. $client->user->id,
        ]);

        $comuna=Commune::where('name',$request->commune)->first();
        $ciudad=City::where('name',$request->city)->first();


        if (!$comuna){      //Si la comuna no existe se crea
            $comuna=Commune::create([
                'name' =>$request->commune,
            ]);
        }

        if (!$ciudad){      //Si la ciudad no existe se crea
            $ciudad=City::create([
                'name' =>$request->city,
            ]);
        }

        $client->user->name=$request->name;
        $client->user->last_name=$request->last_name;
        $client->phone->landline=$request->landline;
        $client->phone->mobile_phone=$request->mobile_phone;
        $client->address->city_id=$ciudad->id;
        $client->address->commune_id=$comuna->id;
        $client->address->numeration=$request->numeration;
        $client->user->email=$request->email;
        $client->user->slug=$request->slug;



        $client->user->save();
        $client->phone->save();
        $client->address->save();
        $client->save();

        return redirect()->route('client.index')->with('success', 'Cliente actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->user->delete();
        $client->delete();
        return redirect()->route('client.index')->with('success','Cliente eliminado con éxito');
    }
}
