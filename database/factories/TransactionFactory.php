<?php

use App\Project;

$factory->define(App\Transaction::class, function (Faker\Generator $faker) {
    return [
        "project_id" => Project::all()->random(1)->first()->id,
        "transaction_type_id" => factory('App\TransactionType')->create(),
        "income_source_id" => factory('App\IncomeSource')->create(),
        "title" => $faker->name,
        "description" => $faker->name,
        "amount" => $faker->randomFloat(2, 1, 100),
        "currency_id" => \App\Currency::all()->random(1)->first()->id,
        "transaction_date" => $faker->date("Y-m-d", $max = 'now'),
    ];
});
