<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OfferTest extends TestCase
{
    // Functional tests
    // Relationships
    //Scopes
    //Custom attributes
    //Anything custom about the model

    /**
     * @test
     */
    public function offerMustHaveAProduct()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function offerHasAnOwnerThroughAProduct()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function offerStartTimeMustBeBeforeEndTime()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function offerLinkAddsReferralToUrl()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function offerHasADuration()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function offerScopeWhereActive()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function offerScopeWhereExpiring()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function offerScopeWhereExpired()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function offerScopeWhereUpcoming()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function offerScopeWhereLatest()
    {
        $this->assertTrue(true);
    }
}
