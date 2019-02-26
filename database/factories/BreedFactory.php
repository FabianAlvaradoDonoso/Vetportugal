<?php

use Faker\Generator as Faker;

$factory->define(\App\Breed::class, function (Faker $faker) {
    return [
        'name'=> $faker->unique()->word,
        'type_id' => \App\Type::all()->random()->id,
    ];
});
