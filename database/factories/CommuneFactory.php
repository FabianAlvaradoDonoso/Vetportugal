<?php

use Faker\Generator as Faker;

$factory->define(App\Commune::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['HUECHURABA','QUILICURA','CONCHALI','LA REINA','QUILIN','LA FLORIDA', 'PEÑALOLEN','MAIPU','RECOLETA']),
    ];
});
