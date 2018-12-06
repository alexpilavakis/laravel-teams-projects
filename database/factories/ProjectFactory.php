<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'title' => $faker->firstNameFemale,
        'description' => $faker->realText(50),
        'completed' => false
    ];
});
