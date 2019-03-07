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

        $fecha = new DateTime();
        $fecha->setDate(date('Y'), date('m'), date('d'));
        $ahora = $fecha->format('Y-m-d');

        for ($i=0; $i < 14; $i++) {

            Date::create([
                'date' => $ahora
            ]);

            $fecha->modify('+1 days');
            $ahora = $fecha->format('Y-m-d');
        }
    }
}
