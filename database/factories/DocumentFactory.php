<?php

$factory->define(App\Document::class, function (Faker\Generator $faker) {
    return [
        "project_id" => factory('App\Project')->create(),
        "title" => $faker->name,
        "description" => $faker->name,
    ];
});
