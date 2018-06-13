<?php

$factory->define(App\Client::class, function (Faker\Generator $faker) {
    return [
        "first_name" => $faker->name,
        "last_name" => $faker->name,
        "company_name" => $faker->name,
        "email" => $faker->safeEmail,
        "phone" => $faker->name,
        "website" => $faker->name,
        "skype" => $faker->name,
        "country" => $faker->name,
        "client_status_id" => factory('App\ClientStatus')->create(),
    ];
});
