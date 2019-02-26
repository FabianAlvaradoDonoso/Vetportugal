<?php

use Faker\Generator as Faker;

$factory->define(App\ExamPet::class, function (Faker $faker) {
    return [
        'pet_id' => App\Pet::all()->random()->id,
        'exam_id' => App\Exam::all()->random()->id,
        'status' => $faker->randomElement(['MR', 'RR', 'RE', 'HA']),
        'views' => $faker->word,
    ];
});
