<?php

use App\Creator;
use Faker\Generator as Faker;

$company_avatars = [
    'v1538130319/company1.jpg',
    'v1539338071/company2.png',
    'v1539338015/company3.png'
];

$factory->define(Creator::class, function (Faker $faker) use ($company_avatars) {
    return [
        'name' => $faker->name('female'),
        'avatar' => array_random($company_avatars),
    ];
});

$factory->state(Creator::class, 'company', function (Faker $faker) use ($company_avatars) {
    return [
        'name' => $faker->company(),
        'avatar' => array_random($company_avatars),
    ];
});
