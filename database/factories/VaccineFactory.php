<?php

use Faker\Generator as Faker;

$factory->define(\App\Vaccine::class, function (Faker $faker) {
    return [
        'name'=> $faker->unique()->randomElement(['OCTUPLE', 'ANTIRRABICA', 'PUPPY']),
    ];
});
