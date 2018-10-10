<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function creator(){
        return $this->belongsTo(Creator::class);
    }

    public function offers(){
        return $this->hasMany(Offer::class);
    }

    public function getLogoUrlAttribute()
    {
        //TODO adjust with cloudinary
        return Cloudinary::make($this->logo)->url();
    }
}
