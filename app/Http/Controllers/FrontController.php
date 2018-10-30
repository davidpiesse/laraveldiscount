<?php

namespace App\Http\Controllers;

use App\Offer;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        // $promotedOffers = Offer::promotedOffers(4);

        // $promotedOffer = $promotedOffers->first();

        // if($promotedOffers->count() == 4){
        //     $topOffers = $promotedOffers->shift(1)->take(3)->get();
        // }else{
        //     $topOffers = Offer::promotedOffers(3);
        // }

        // $activeOffers = Offer::active()->get();

        $offers = Offer::sectionOffers();

        // dd($offers);

        $expiringOffers = Offer::expiringThisWeek()->get();

        $upcomingOffers = Offer::future()->take(6)->get();

        return view('front', [
            'promotedOffer' => $offers['promoted'],
            'topOffers' => $offers['top'],
            'activeOffers' => $offers['active'],
            'upcomingOffers' => $upcomingOffers,
            'expiringOffers' => $expiringOffers,
        ]);
    }
}
