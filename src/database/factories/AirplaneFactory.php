<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Airplane;
use Faker\Generator as Faker;

$factory->define(Airplane::class, function (Faker $faker) {

    $result = [
        'id' => $faker->uuid(),
        'model_id' => $faker->uuid(),
//        'hangar_id' => $faker->uuid(),
        'serial_number' => $faker->randomNumber(3) . '-' . $faker->randomElement(['abc', 'cde', 'vfs']),
        'departure' => $faker->country(),
        'arrival' => $faker->country(),
    ];


    return $result;
});
