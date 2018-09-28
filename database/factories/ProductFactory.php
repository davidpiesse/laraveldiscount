<?php

use App\Creator;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

    $creator = factory(Creator::class)->create();

    return [
        'creator_id' => $creator->id,
        'name' => ucwords($faker->domainWord()),
        'logo' => 'v1538130565/product1.png',
        'description' => $faker->sentence(),
        'link' => $faker->url(),
        'category' => null
    ];
});
