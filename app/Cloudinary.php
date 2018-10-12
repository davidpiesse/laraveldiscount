<?php

namespace App;

class Cloudinary
{

    public $cloudinary_image;

    public $options = [];

    public function __construct($image, $options = [])
    {
        $this->cloudinary_image = $image;

        $this->options = $options;
    }

    public static function make($image, $options = [])
    {
        return new self($image, $options);
    }

    //TODO
    public function __call($method, $args)
    {
        if(starts_with($method,['size','effect','crop','gravity','radius'])){
            //Work out how to find out if it is size / etc without a horrible switch
            $parts = explode('_', str_after(snake_case($method),'size'));

            return $this->{'size'}($parts);            
        }
    }

    public function url()
    {
        return cloudinary_image($this->cloudinary_image, $this->options);
    }

    //get the original image
    // ->original()
    public function original()
    {
        return $this;
    }

    //get a specific size
    // ->size(128)
    public function size($size = 128)
    {
        array_push($this->options, [
            'size' => $size
        ]);

        return $this;
    }

    //effects
    // ->effect('grayscale')

    //overidder for effects
    // ->effectGrayscale()

    // "crop" => "crop"

    // "gravity" => "face"
    
    // "radius" => "max"

}
