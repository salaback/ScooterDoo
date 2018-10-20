<?php

use Faker\Generator as Faker;

$factory->define(\App\Station::class, function (Faker $faker) {
    return [
        'lat' => $faker->latitude,
        'long' => $faker->longitude,
        'name' => $faker->lastName . ' Hall'
    ];
});
