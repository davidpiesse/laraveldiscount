<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Creator extends Model
{
    protected $guarded = [];

    public function customAvatar($options = []){
        //Get a custom response from Cloudinary with the options included
        //size
        //black & white
        //circle
        //face detect
    }

    public function smallAvatar(){
        return $this->customAvatar([
            'width' => 128,
            'height' => 128,
        ]);
    }

    public function greyscaleAvatar(){
        return $this->customAvatar([
            'color' => 'grey'
        ]);
    }

    //scope for advertisers
    public function scopeAdvertisers($query){
        
    }
}
