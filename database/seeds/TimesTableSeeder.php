<?php

use App\Time;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('date_times')->delete();
        DB::table('times')->delete();
        
        $fecha = new DateTime('2000-01-01 10:00:00');
        $ahora = $fecha->format('H:i:s');

        for ($i=0; $i < 16; $i++) { 
            Time::create([
                'time' => $ahora
            ]);

            $fecha->modify('+30 minutes');
            $ahora = $fecha->format('H:i:s');
        }

    }
}
