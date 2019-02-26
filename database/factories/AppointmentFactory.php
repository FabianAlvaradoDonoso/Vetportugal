<?php

use App\Date;
use App\State;
use App\DateTime;
use App\Vet;
use Faker\Generator as Faker;

$factory->define(App\Appointment::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'phone' => $faker->unique()->phoneNumber,
        'vet_id' => Vet::all()->random()->id,
        'state_id' => State::all()->random()->id,
        'date_times_id' => DateTime::all()->random()->id,
    ];
});
