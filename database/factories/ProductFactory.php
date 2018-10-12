<?php

use App\Creator;
use App\Product;
use Faker\Generator as Faker;

$product_logos = [
    'v1538130565/product1.png',
    'v1539338042/product2.png',
    'v1539338187/product3.png'
];

$factory->define(Product::class, function (Faker $faker) use ($product_logos){

    $creator = factory(Creator::class)->create();

    return [
        'creator_id' => function () {
            return factory(Creator::class)->create()->id;
        },
        'name' => ucwords($faker->domainWord()),
        'logo' => array_random($product_logos),
        'description' => $faker->sentence(),
        'link' => $faker->url(),
        'category' => null
    ];
});

$factory->state(Product::class, 'without-creator', [
    'creator_id' => null,
]);
