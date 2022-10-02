<?php

use Faker\Generator as Faker;
use Faker\Provider\DateTime;
use Faker\Provider\Base;
use Illuminate\Database\Seeder;
use App\Detalle;


$factory->define(App\Detalle::class, function (Faker $faker) {
    return [

        'numero_id' => $faker->numberBetween($min = 1, $max = 82),
        'numerodellamada' => $faker->numberBetween($min = 1, $max = 10),
        'hora'=> $faker->time($format = 'H:i', $max = 'now'),
        'duracion'=> $faker->time($format = 'I:s', $max = '00:04:00'),
    ];
});
