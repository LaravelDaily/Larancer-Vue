<?php

$factory->define(App\Project::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->name,
        "client_id" => factory('App\Client')->create(),
        "description" => $faker->name,
        "start_date" => $faker->date("Y-m-d", $max = 'now'),
        "budget" => $faker->name,
        "project_status_id" => factory('App\ProjectStatus')->create(),
    ];
});
