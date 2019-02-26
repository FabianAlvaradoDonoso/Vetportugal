<?php

use App\Date;
use App\Time;
use Faker\Generator as Faker;

$factory->define(App\DateTime::class, function (Faker $faker) {
    return [
        'date_id' => Date::all()->random()->id,
        'time_id' => Time::all()->random()->id,
    ];
});
