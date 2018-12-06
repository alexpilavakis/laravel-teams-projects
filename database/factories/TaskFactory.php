<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'completed' => false,
        'description' => $faker->realText(50)
    ];
});
