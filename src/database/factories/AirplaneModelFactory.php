<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AirplaneModel;
use Faker\Generator as Faker;

$factory->define(AirplaneModel::class, function (Faker $faker) {
    $airplanes = [
        'Aeroprakt' => 'A-24',
        'Curtiss' => 'NC-4',
        'Boeing' => '747'
    ];

    $result = [
        'id' => $faker->uuid(),
        'name' => $faker->randomElement(['Aeroprakt', 'Curtiss', 'Boeing']),
    ];

    $result['model'] = $airplanes[$result['name']];

    return $result;
});
