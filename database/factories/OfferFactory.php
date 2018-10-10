<?php

use App\Offer;
use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(Offer::class, function (Faker $faker) {

    $start_day = rand(-20,20);
    $end_day = $start_day + rand(1,20);
    return [
        'product_id' => function(){
            return factory(Product::class)->create()->id;
        },
        'title' => $faker->words(4, true),
        'start_time' => Carbon::now()->addDays($start_day),
        'end_time' => Carbon::now()->addDays($end_day),
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
