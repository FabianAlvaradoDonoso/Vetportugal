<?php

use Faker\Generator as Faker;

$factory->define(App\Vet::class, function (Faker $faker) {
    $rut= $faker->numberBetween(8000000,25000000);
    return [
        'user_id' => null,
        'phone_id'=> \App\Phone::all()->random()->id,
        'rut'=> $rut,
    ];
});
