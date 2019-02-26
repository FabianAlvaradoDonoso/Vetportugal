<?php

use Faker\Generator as Faker;

$factory->define(App\Cage::class, function (Faker $faker) {
    $description= $faker->sentence;
    return [
        'pet_id'=> \App\Pet::all()->random()->id,
        'description' => $description,
    ];
});
