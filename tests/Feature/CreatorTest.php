<?php

namespace Tests\Feature;

use App\Creator;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Exceptions\MissingDataException;
use Illuminate\Database\QueryException;

class CreatorTest extends TestCase
{
    use RefreshDatabase;

    // Functional tests
    // Relationships
    //Scopes
    //Custom attributes
    //Anything custom about the model

    /**
     * @test
     */
    public function creatorCanOwnAProduct()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function creatorCanOwnManyProducts()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function creatorCanOwnOffersThroughAProduct()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function creatorCanOwnManyOffersThroughManyProducts()
    {
        $this->assertTrue(true);
    }

}
