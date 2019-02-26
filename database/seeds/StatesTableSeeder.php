<?php

use App\State;
use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->delete();

        State::insert([
            [
                'state' => 'confirmado'
            ],
            [
                'state' => 'reservado'
            ],
            [
                'state' => 'disponible'
            ]
        ]);

    }
}
