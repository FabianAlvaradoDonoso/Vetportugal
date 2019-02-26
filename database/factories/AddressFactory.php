<?php

use Faker\Generator as Faker;

$factory->define(App\Address::class, function (Faker $faker) {
    $street= $faker->streetName;
    $numeration=$faker->buildingNumber;
    return [
        'commune_id' => \App\Commune::all()->random()->id,
        'city_id'=> \App\City::all()->random()->id,
        'street' => $street,
        'numeration' => $numeration,
    ];
});
