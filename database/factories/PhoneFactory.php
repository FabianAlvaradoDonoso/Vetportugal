<?php

use Faker\Generator as Faker;

$factory->define(App\Phone::class, function (Faker $faker) {
    return [
        'landline' => $faker->phoneNumber,
        'mobile_phone' => $faker->phoneNumber,
    ];
});
