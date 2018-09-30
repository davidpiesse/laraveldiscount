<?php

namespace Tests\Feature;

use App\Offer;
use App\Creator;
use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;

class OfferTest extends TestCase
{
    use RefreshDatabase;
    
    // /**
    //  * @test
    //  */
    // public function offerMustHaveAProduct()
    // {
    //     $this->assertTrue(true);
    // }

    /**
     * @test
     */
    public function promotedOffersReturnInTheCorrectOrder()
    {

        Carbon::setTestNow(Carbon::create(2018,5,5,13,15,15));

        $offer1 = factory(Offer::class)->create([
            'start_time' => Carbon::now(),
            'end_time' => Carbon::now()->addDays(1),
        ]);

        $offer2 = factory(Offer::class)->create([
            'start_time' => Carbon::now(),
            'end_time' => Carbon::now()->addDays(2),
        ]);

        $offer3 = factory(Offer::class)->create([
            'start_time' => Carbon::now(),
            'end_time' => Carbon::now()->addDays(3),
        ]);

        $offer4 = factory(Offer::class)->create([
            'start_time' => Carbon::now(),
            'end_time' => Carbon::now()->addDays(4),
        ]);

        $offer5 = factory(Offer::class)->create([
            'start_time' => Carbon::now(),
            'end_time' => Carbon::now()->addDays(5),
        ]);

        $this->assertEquals([2,3,4,1] , Offer::promotedOffers(4)->pluck('id')->toArray());

        Carbon::setTestNow(Carbon::create(2018,5,5,14,15,15));

        $this->assertEquals([3,4,1,2] , Offer::promotedOffers(4)->pluck('id')->toArray());
    }

    /**
     * @test
     */
    public function offerHasAnOwnerThroughAProduct()
    {
        $creator = factory(Creator::class)->create();

        $product = factory(Product::class)->create([
            'creator_id' => $creator->id
        ]);

        $offer = factory(Offer::class)->create([
            'product_id' => $product->id
        ]);

        $this->assertEquals($creator->id, $offer->creator->id);
    }

    /**
     * @test
     * TODO
     */
    public function offerStartTimeMustBeBeforeEndTime()
    {
        $offer = factory(Offer::class)->create([
            'start_time' => Carbon::now(),
            'end_time' => Carbon::now()->subHour(),
        ]);
        
        $this->assertTrue(true);
        //validation for feature test to capture an error
        // dd($offer);
        // $this->assertEquals($creator->id, $offer->creator->id);
    }

    /**
     * @test
     */
    public function offerLinkAddsReferralToUrl()
    {
        $offer_no_props = factory(Offer::class)->make([
            'link' => "https://laravel.com/offer",
        ]);

        $this->assertEquals("https://laravel.com/offer?ref=laraveldiscount", $offer_no_props->url);

        $offer_with_props = factory(Offer::class)->make([
            'link' => "https://laravel.com/offer?code=10OFF",
        ]);

        $this->assertEquals("https://laravel.com/offer?code=10OFF&ref=laraveldiscount", $offer_with_props->url);
    }

    /**
     * @test
     */
    public function offerHasADuration()
    {
        $offer = factory(Offer::class)->make([
            'start_time' => Carbon::now(),
            'end_time' => Carbon::now()->addDays(2)
        ]);

        $this->assertEquals(2, $offer->duration->days); //or ->d

        $offer2 = factory(Offer::class)->make([
            'start_time' => Carbon::now(),
            'end_time' => Carbon::now()->addHours(4)
        ]);

        $this->assertEquals(4, $offer2->duration->h);
    }

    /**
     * @test
     */
    public function offerIsMarkedAsActiveIfCurrentlyLive()
    {
        $active_offer = factory(Offer::class)->create([
            'start_time' => now()->subDay(),
            'end_time' => now()->addDay(),
        ]);

        $inactive_offer = factory(Offer::class)->create([
            'start_time' => now()->addWeeks(1),
            'end_time' => now()->addWeeks(2),
        ]);

        $this->assertCount(2, Offer::all());

        $this->assertCount(1, Offer::active()->get());

        $this->assertEquals($active_offer->id, Offer::active()->first()->id);
    }

    /**
     * @test
     */
    public function offerScopeWhereExpiring()
    {
        $expiring_offer = factory(Offer::class)->create([
            'start_time' => now()->subDay(),
            'end_time' => now()->addHours(23),
        ]);

        $active_long_offer = factory(Offer::class)->create([
            'start_time' => now()->subDay(3),
            'end_time' => now()->addHours(25),
        ]);

        $this->assertCount(2, Offer::all());

        $this->assertCount(1, Offer::expiring()->get());

        $this->assertEquals($expiring_offer->id, Offer::expiring()->first()->id);
    }

    /**
     * @test
     */
    public function offerIsMarkedAsExpiredIfAlreadyRun()
    {
        $active_offer = factory(Offer::class)->create([
            'start_time' => now()->subDay(),
            'end_time' => now()->addDay(),
        ]);

        $expired_offer = factory(Offer::class)->create([
            'start_time' => now()->subWeeks(2),
            'end_time' => now()->subWeeks(1),
        ]);

        $this->assertCount(2, Offer::all());

        $this->assertCount(1, Offer::expired()->get());

        $this->assertEquals($expired_offer->id, Offer::expired()->first()->id);
    }

    /**
     * @test
     */
    public function offerIsMarkedAsFutureIfYetToRun()
    {
        $active_offer = factory(Offer::class)->create([
            'start_time' => now()->subDay(),
            'end_time' => now()->addDay(),
        ]);

        $future_offer = factory(Offer::class)->create([
            'start_time' => now()->addDays(8),
            'end_time' => now()->addDays(10),
        ]);

        $this->assertCount(2, Offer::all());

        $this->assertCount(1, Offer::future()->get());

        $this->assertEquals($future_offer->id, Offer::future()->first()->id);
    }

    /**
     * @test
     */
    public function offerIsMarkedAsUpcomingIfYetToRunWithinAWeek()
    {
        $active_offer = factory(Offer::class)->create([
            'start_time' => now()->subDay(),
            'end_time' => now()->addDay(),
        ]);

        $upcoming_offer = factory(Offer::class)->create([
            'start_time' => now()->addDays(2),
            'end_time' => now()->addDays(6),
        ]);

        $future_offer = factory(Offer::class)->create([
            'start_time' => now()->addDays(8),
            'end_time' => now()->addDays(10),
        ]);

        $this->assertCount(3, Offer::all());

        $this->assertCount(1, Offer::upcoming()->get());

        $this->assertEquals($upcoming_offer->id, Offer::upcoming()->first()->id);
    }

    /**
     * @test
     */
    public function offerScopeWhereLatest()
    {
        $active_offer1 = factory(Offer::class)->create([
            'start_time' => now()->subDays(5),
            'end_time' => now()->addDays(4),
        ]);

        $active_offer2 = factory(Offer::class)->create([
            'start_time' => now()->subDays(3),
            'end_time' => now()->addDays(4),
        ]);

        $active_offer3 = factory(Offer::class)->create([
            'start_time' => now()->subDays(1),
            'end_time' => now()->addDays(4),
        ]);


        $this->assertCount(3, Offer::all());

        $this->assertEquals($active_offer3->id, Offer::latest()->id);

    }
}
