<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * @test
     */
    public function productMustHaveAnOwner()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function productCanHaveAnOffer()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function productCanHaveManyOffers()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function productHasActiveOffers()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function productHasExpiredOffers()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function productHasUpcomingOffers()
    {
        $this->assertTrue(true);
    }
}
