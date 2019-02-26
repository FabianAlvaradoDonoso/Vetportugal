<?php

use App\Date;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('date_times')->delete();
        DB::table('dates')->delete();

        $fecha = new DateTime('2019-02-19');
        $ahora = $fecha->format('Y-m-d');

        for ($i=0; $i < 7; $i++) { 
           
            Date::create([
                'date' => $ahora
            ]);

            $fecha->modify('+1 days');
            $ahora = $fecha->format('Y-m-d');
        }
    }
}
