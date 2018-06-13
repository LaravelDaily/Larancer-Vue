<?php

$factory->define(App\ClientStatus::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->name,
    ];
});
