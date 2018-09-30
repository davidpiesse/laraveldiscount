<?php

namespace App;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getCreatorAttribute()
    {
        return $this->product->creator;
    }

    public function scopeActive($query)
    {
        return $query->where('start_time', '<=', Carbon::now())
            ->where('end_time', '>', Carbon::now())
            ->orderBy('end_time');
    }

    public function scopeExpired($query)
    {
        return $query->where('end_time', '<', Carbon::now());
    }

    public function scopeExpiring($query)
    {
        return $query->active()
            ->where('end_time', '<=', Carbon::now()->addDay())
            ->orderBy('end_time');
    }

    public function scopeFuture($query)
    {
        return $query->where('start_time', '>', Carbon::now());
    }

    public function scopeUpcoming($query)
    {
        return $query->future()->where('start_time', '<=', Carbon::now()->addWeek());
    }

    public static function latest()
    {
        return self::active()->orderByDesc('start_time')->first();
    }

    public function getDurationAttribute()
    {
        return $this->start_time->diff($this->end_time);
    }

    public function getUrlAttribute()
    {
        if (!is_null(parse_url($this->link, PHP_URL_QUERY))) {
            return $this->link . "&ref=laraveldiscount";
        }
        return $this->link . "?ref=laraveldiscount";
    }

    public static function promotedOffers($maximum = 4) //assume this can only be 2,4,6,8
    {
        $offers = self::active()->take($maximum)->get();

        $start_index = (Carbon::now()->hour) % $maximum; // (0-23)

        $start_chunk = $offers->splice((Carbon::now()->hour % $maximum));

        return $start_chunk->merge($offers);
    }

}
