<?php

$factory->define(App\Transaction::class, function (Faker\Generator $faker) {
    return [
        "project_id" => factory('App\Project')->create(),
        "transaction_type_id" => factory('App\TransactionType')->create(),
        "income_source_id" => factory('App\IncomeSource')->create(),
        "title" => $faker->name,
        "description" => $faker->name,
        "amount" => $faker->randomFloat(2, 1, 100),
        "currency_id" => factory('App\Currency')->create(),
        "transaction_date" => $faker->date("Y-m-d", $max = 'now'),
    ];
});
