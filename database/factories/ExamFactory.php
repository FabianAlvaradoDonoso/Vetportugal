<?php

use Faker\Generator as Faker;

$factory->define(App\Exam::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(5),
        'characteristics' => $faker->sentence(7),
        'views' => $faker->word,
        'type' => $faker->randomElement(['General', 'Quirurgico', 'Radiografico']),
    ];
});
