<?php

use Faker\Generator as Faker;

$factory->define(App\Specialty::class, function (Faker $faker) {
    $name = $faker->jobTitle;
    return [
        'name'=> $faker->jobTitle,
    ];
});
