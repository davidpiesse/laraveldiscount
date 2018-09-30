<?php

namespace Tests\Feature;

use App\Offer;
use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * @test
     */
    public function productMustHaveAnOwner()
    {
        $this->expectExceptionCode(23000);

        $product = factory(Product::class)->state('without-creator')->create();

        //TODO Product throws cutom exception

        //test a good product with creator_id
    }

    /**
     * @test
     */
    public function productCanHaveAnOffer()
    {
        $product = factory(Product::class)->create();

        $offer = factory(Offer::class)->make();

        $product->offers()->save($offer);

        $this->assertEquals($product->id, $offer->product_id);

        $this->assertCount(1, $product->offers);
    }

    /**
     * @test
     */
    public function productCanHaveManyOffers()
    {
        $product = factory(Product::class)->create();

        $offers = factory(Offer::class,3)
        ->make()
        ->each(function($offer) use ($product){
            $product->offers()->save($offer);
        });

        $this->assertCount(3, $product->offers);
    }
}
