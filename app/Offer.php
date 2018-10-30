<?php

namespace App;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Offer extends Model
{
    use Notifiable;

    protected $guarded = [];

    public $with = ['product'];

    public $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

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

    public function scopeExpiringBefore($query, $before_datetime)
    {
        return $query->active()
            ->where('end_time', '<=', $before_datetime)
            ->orderBy('end_time');
    }

    public function scopeExpiring($query)
    {
        return $query->expiringBefore(Carbon::now()->addDay());
    }

    public function scopeExpiringThisWeek($query)
    {
        return $this->expiringBefore(Carbon::now()->addWeek());
    }

    public function scopeFuture($query)
    {
        return $query->where('start_time', '>', Carbon::now());
    }
    
    public function scopeUpcomingBefore($query, $before_datetime)
    {
        return $query->future()->where('start_time', '<=', $before_datetime);
    }

    public function scopeUpcoming($query)
    {
        return $query->upcomingBefore(Carbon::now()->addWeek());
    }

    public function scopeUpcomingTomorrow($query)
    {
        return $query->upcomingBefore(Carbon::now()->addDay());
    }
    
    public static function latest()
    {
        return self::active()->orderByDesc('start_time')->first();
    }

    public function getDurationAttribute()
    {
        return $this->start_time->diff($this->end_time);
    }

    public function getHasCodeAttribute()
    {
        return !is_null($this->code) && $this->offer_type == 'CODE';
    }

    public function getHasDescriptionAttribute()
    {
        return !is_null($this->description);
    }

    public function getExpiresInAttribute()
    {
        $expires_in_days = now()->diffInDays($this->end_time);

        if($expires_in_days > 0)
            if($expires_in_days > 31)
                return 'expires in ' . now()->diffInMonths($this->end_time) . ' ' . str_plural('month',now()->diffInMonths($this->end_time));
            else
                return 'expires in ' . $expires_in_days . ' ' . str_plural('day', $expires_in_days);
        else
            return 'expires in ' . now()->diffInHours($this->end_time) . ' hours';
    }

    public function getUrlAttribute()
    {
        if (!is_null(parse_url($this->link, PHP_URL_QUERY))) {
            return $this->link . "&referrer=laraveldiscount";
        }
        return $this->link . "?referrer=laraveldiscount";
    }

    public static function promotedOffers($maximum = 4) //assume this can only be 2,4,6,8
    {
        $offers = self::active()->take($maximum)->get();

        $start_index = (Carbon::now()->hour) % $maximum; // (0-23)

        $start_chunk = $offers->splice((Carbon::now()->hour % $maximum));

        return $start_chunk->merge($offers);
    }

    public function twitterMessage()
    {
        return $this->title. ' ' . $this->product->name. ' @ LaravelDiscount.com';
    }

    public static function sectionOffers(){

        $active_offers = self::active()->get();

        $shuffled_offers = $active_offers->shuffle();

        $promoted_offer = $shuffled_offers->shift();

        $top_offers = $shuffled_offers->splice(0,3);

        return [
            'promoted' => $promoted_offer,
            'top' => $top_offers,
            'active' => $shuffled_offers,
        ];
    }

}
