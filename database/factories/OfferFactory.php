<?php

use App\Offer;
use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(Offer::class, function (Faker $faker) {
    return [
        'product_id' => function(){
            return factory(Product::class)->create()->id;
        },
        'title' => $faker->sentence(),
        'start_time' => Carbon::now()->subDay(),
        'end_time' => Carbon::now()->addDay(),
        'offer_type' => 'CODE',
        'link' => $faker->url(),
        'code' => '10% off',
    ];

//     * Product ID
// * Title (Explaining the offer such as 10% off)
// * StartTime
// * EndTime
// * OfferType (FREE, CODE or LINK ; determines how to display the offer)
// * Link (Required for all)
// * Code (When there is a specific code required)
});
