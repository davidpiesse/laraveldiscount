<?php

namespace Tests\Feature;

use App\Creator;
use App\Product;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Cloudinary;
use App\Offer;

class CreatorTest extends TestCase
{
    use RefreshDatabase;


    // $l = Cloudinary::make('test.png')->size128();

    // $c = factory(Creator::class)->make();

    // $p = factory(Product::class)->make();

    // $p = factory(Product::class)->state('without-creator')->make();

    // $link = cloudinary_image($c->avatar);

    /**
     * @test
     */
    public function creatorCanOwnAProduct()
    {
        $creator = factory(Creator::class)->create();

        $product = factory(Product::class)
            ->state('without-creator')
            ->make();

        $creator->products()
            ->save($product);

        $this->assertEquals($creator->id, $product->creator_id);

        $this->assertCount(1, $creator->products);
    }

    /**
     * @test
     */
    public function creatorCanOwnManyProducts()
    {
        $creator = factory(Creator::class)->create();

        $products = factory(Product::class, 3)
            ->state('without-creator')
            ->make()
            ->each(function ($product) use ($creator) {
                $creator->products()
                    ->save($product);
            });

        $this->assertCount(3, $creator->products);
    }

    /**
     * @test
     */
    public function creatorCanOwnOffersThroughAProduct()
    {

        $creator = factory(Creator::class)->create();

        $product = factory(Product::class)->create([
            'creator_id' => $creator->id
        ]);

        $offer = factory(Offer::class)->create([
            'product_id' => $product->id
        ]);

        $this->assertCount(1, $creator->offers);
    }

    /**
     * @test
     */
    public function creatorCanRetrieveAnUploadedAvatar()
    {
        $this->assertTrue(true);

        Storage::fake('avatars');

        $avatar = UploadedFile::fake()->image('avatar.png');

        $file = Storage::disk('avatars')->put('avatars', $avatar);

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
