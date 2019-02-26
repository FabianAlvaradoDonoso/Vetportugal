<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('pets');
        Storage::deleteDirectory('users');

        Storage::makeDirectory('pets');
        Storage::makeDirectory('users');


        factory(\App\Commune::class,10)->create(); //Creación de comunas
        factory(\App\City::class,10)->create();     //Creación de ciudades
        factory(\App\Phone::class,10)->create();    //Creación de telefonos
        factory(\App\Address::class,10)->create();  //Creacion de direcciones
        factory(\App\Type::class,10)->create();         //Creación de tipos de animales
        factory(\App\Breed::class,10)->create();    //Creación de Razas

        factory(\App\Gender::class,1)->create(['name'=> 'MALE']);
        factory(\App\Gender::class,1)->create(['name'=> 'FEMALE']);

        factory(\App\Vaccine::class,1)->create(['name'=> 'ANTIRRABICA']);
        factory(\App\Vaccine::class,1)->create(['name'=> 'PUPPY DP']);
        factory(\App\Vaccine::class,1)->create(['name'=> 'OCTUPLE']);



        //factory(\App\Gender::class,10)->create();
        // factory(\App\Deworming::class,10)->create();         //Creación de tipos de animales


        factory(\App\Food::class,10)->create();         //Creación de nombres de comidas


        //********* Creación de Roles **************

        factory(\App\Role::class,1)->create(['name'=> 'vetmaster']);
        factory(\App\Role::class,1)->create(['name'=> 'vet']);
        factory(\App\Role::class,1)->create(['name'=> 'client']);
        factory(\App\Role::class,1)->create(['name'=> 'visitor']);

        // ***********************************************************

        factory(\App\User::class, 1)->create([      //Creación de usuario de prueba VETMASTER
            'name' => 'vetmaster',
            'email' => 'vetmaster@mail.com',
            'password' => bcrypt('secret'),
            'role_id' =>\App\Role::VETMASTER
        ])
            ->each(function (\App\User $u){
                factory(\App\Client::class,1)->create(['user_id' => $u->id]);
            });

        factory(\App\User::class, 1)->create([      //Creación de usuario de prueba CLIENT
            'name' => 'client',
            'email' => 'client@mail.com',
            'password' => bcrypt('secret'),
            'role_id' =>\App\Role::CLIENT
        ])
            ->each(function (\App\User $u){
                factory(\App\Client::class,1)->create(['user_id' => $u->id]);
            });

        //Para crear clientes de forma masiva

        factory(\App\User::class,20) ->create()
            ->each(function (\App\User $u){
                factory(\App\Client::class,1)->create(['user_id'=> $u->id]);
            });


        //Para crear Veterinarios de forma masiva

        factory(\App\User::class,10) ->create()
            ->each(function (\App\User $u){
                factory(\App\Client::class,1)->create(['user_id'=> $u->id]);
                factory(\App\Vet::class,1)->create(['user_id'=> $u->id]);
            });

        //Para crear mascotas de forma masiva
        factory(\App\Pet::class, 20)
            ->create();

        factory(\App\Deworming::class,10)->create();         //Creación de tipos de animales
        factory(\App\Exam::class,50)->create();         //Creación de procedimientos
        factory(\App\ExamPet::class,10)->create();         //Creación de Examenes
        factory(\App\Specialty::class,10)->create();         //Creación de


        $this->call([
            TimesTableSeeder::class,
            DatesTableSeeder::class,
            StatesTableSeeder::class,
            ]);

        factory(\App\DateTime::class, 10)->create();
        factory(\App\Appointment::class, 20)->create();


    }
}
