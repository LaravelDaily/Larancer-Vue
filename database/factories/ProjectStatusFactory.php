<?php

$factory->define(App\ProjectStatus::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->name,
    ];
});
