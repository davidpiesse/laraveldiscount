<?php

use App\Offer;

Route::view('/', 'welcome');

Route::get('/main', function(){

    $promotedOffer = Offer::first();

    $topOffers = Offer::skip(1)->take(3)->get();

    $activeOffers = Offer::latest()->take(3)->get();

    $expiringOffers = Offer::expiringThisWeek()->take(3)->get();

    $upcomingOffers = Offer::upcoming()->take(6)->get();

    return view('main', [
        'promotedOffer' => $promotedOffer,
        'topOffers' => $topOffers,
        'activeOffers' => $activeOffers,
        'upcomingOffers' => $upcomingOffers,
        'expiringOffers' => $expiringOffers,
    ]);
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
