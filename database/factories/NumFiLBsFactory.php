<?php
use Faker\Generator as Faker;
use Faker\Provider\DateTime;
use Faker\Provider\Base;
use Illuminate\Database\Seeder;
use App\Num_fiLB;


$factory->define(Num_fiLB::class, function (Faker $faker) {
    return [

        'numlista' => $faker->e164PhoneNumber,
        

        //
    ];
});
