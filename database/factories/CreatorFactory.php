<?php

use App\Creator;
use Faker\Generator as Faker;

$factory->define(Creator::class, function (Faker $faker) {
    return [
        'name' => $faker->name('female'),
        'avatar' => 'v1538129951/avatar1.jpg',
    ];
});

$factory->state(Creator::class, 'company', function ($faker) {
    return [
        'name' => $faker->company(),
        'avatar' => 'v1538130319/company1.jpg',
    ];
});
