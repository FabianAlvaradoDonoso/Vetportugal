<?php

use Faker\Generator as Faker;

$factory->define(App\Vaccination::class, function (Faker $faker) {
    $scheduled_date= $faker->date();
    $application_date= $faker->date();
    return [
        'vaccine_id'=> App\Vaccine::all()->random()->id,
        'pet_id' => App\Pet::all()->random()->id,
        'scheduled_date'=>$scheduled_date,
        'application_date' =>$application_date,

    ];
});
