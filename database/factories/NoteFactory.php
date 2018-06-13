<?php

$factory->define(App\Note::class, function (Faker\Generator $faker) {
    return [
        "project_id" => factory('App\Project')->create(),
        "note_text" => $faker->name,
    ];
});
