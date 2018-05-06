<?php

use Faker\Generator as Faker;

$factory->define(App\Admin::class, function (Faker $faker) {
    return [
        'name' => $faker->paragraph,
        'email' => $faker->email,
        'password' => bcrypt(123123),
        'getip' => ip2long('127.0.0.1'),
    ];
});
