<?php

$factory->define(App\IncomeSource::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->name,
        "fee_percent" => $faker->randomFloat(2, 1, 100),
    ];
});
