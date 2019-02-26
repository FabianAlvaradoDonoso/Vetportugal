<?php

use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) {
    return [
        'user_id'=> null,
        'address_id'=> \App\Address::all()->random()->id,
        'phone_id'=> \App\Phone::all()->random()->id,
    ];
});
