<?php

use Faker\Generator as Faker;

$factory->define(App\Deworming::class, function (Faker $faker) {
    $type = $faker->word;
    $scheduled_date=$faker->date();
    $application_date= $faker->date();
    return [
        'pet_id'=> \App\Pet::all()->random()->id,
        'type' =>$type,
        'scheduled_date' =>$scheduled_date,
        'application_date' =>$application_date,
    ];
});
