<?php

namespace App\Http\Controllers;

use App\Offer;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $promotedOffers = Offer::promotedOffers(2);

        $promotedOffer = $promotedOffers->first();

        $topOffers = Offer::promotedOffers(4)->shift(1)->take(3)->get();

        $activeOffers = Offer::latest()->get();

        $expiringOffers = Offer::expiringThisWeek()->get();

        $upcomingOffers = Offer::upcoming()->take(6)->get();

        return view('front', [
            'promotedOffer' => $promotedOffer,
            'topOffers' => $topOffers,
            'activeOffers' => $activeOffers,
            'upcomingOffers' => $upcomingOffers,
            'expiringOffers' => $expiringOffers,
        ]);
    }
}
