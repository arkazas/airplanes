<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Hangar;
use Faker\Generator as Faker;

$factory->define(Hangar::class, function (Faker $faker) {

    $result = [
        'id' => $faker->uuid(),
        'name' => $faker->name(),
    ];

    return $result;
});
