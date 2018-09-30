<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use App\Exceptions\MissingDataException;

class Creator extends Model
{
    protected $guarded = [];



    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function offers()
    {
        return $this->hasManyThrough(Offer::class, Product::class);
    }

    //IGNORE BELOW

    public function customAvatar($options = [])
    {
        $defaults = collect([
            'height' => 256,
            'crop' => 'crop',
            'gravity' => 'face',
            'radius' => 'max'
        ]);

        return cloudinary_image($this->avatar, $defaults->merge($options));

        // "height" => 128
        // "crop" => "crop"
        // "gravity" => "face"
        // "effect" => "grayscale"
        // "radius" => "max"
    }

    public function smallAvatar()
    {
        return $this->customAvatar([
            'height' => 128,
        ]);
    }

    public function greyscaleAvatar()
    {
        return $this->customAvatar([
            'effect' => 'grayscale'
        ]);
    }

    //scope for advertisers
    public function scopeAdvertisers($query)
    {

    }
}
