<?php

$factory->define(App\TransactionType::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->name,
    ];
});
