<?php

namespace Tests\Feature;

use App\Creator;
use App\Product;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreatorTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function creatorCanOwnAProduct()
    {
        $this->assertTrue(true);

        $c = factory(Creator::class)->make();

        $p = factory(Product::class)->make();

        dd($p);

        $link = cloudinary_image($c->avatar);
        dd($c, $link);
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

    /**
     * @test
     */
    public function creatorCanRetrieveAnUploadedAvatar()
    {
        $this->assertTrue(true);

        Storage::fake('avatars');

        $avatar = UploadedFile::fake()->image('avatar.png');

        $file = Storage::disk('avatars')->put('avatars',$avatar);

        Storage::disk('avatars')->assertExists($file);
    }

    /**
     * @test
     */
    public function creatorCanRetrieveAnUploadedAvatarWithCustomOptions()
    {
        $this->assertTrue(true);
    }

}
