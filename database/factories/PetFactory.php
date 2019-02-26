<?php

use Faker\Generator as Faker;

$factory->define(App\Pet::class, function (Faker $faker) {
    $name= $faker->name;
    $birthdate= $faker->date();
    $color= $faker->safeColorName;
    $castration_date= $faker->date();
    $weight= $faker->numberBetween(10,50);
    return [
        'breed_id'=> \App\Breed::all()->random()->id,
        'gender_id' => \App\Gender::all()->random()->id,
        'food_id'=>\App\Food::all()->random()->id,
        'client_id'=> \App\Client::all()->random()->id,
        'name'=> $name,
        'birthdate' => $birthdate,
        'color' => $color,
        'castration_date' =>$castration_date,
        'weight'=> $weight,
        'picture'=> \Faker\Provider\Image::image(storage_path() . '/app/public/pets', 600, 350, 'cats', false),
    ];
});
