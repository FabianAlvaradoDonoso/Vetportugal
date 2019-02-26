<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    return [
        'title' => 'Cita de ' . $faker->unique()->name,
        'start' => $faker->dateTimeBetween('+0 days', '+1 week'),
        'end' => $faker->dateTimeBetween('+0 days', '+1 week'),
    ];
});
