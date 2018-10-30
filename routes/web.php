<?php

use App\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\FrontController;

Route::get('/', function (Request $request){

    // Carbon::setTestNow(Carbon::create(2018,10,31,14,0,0));

    $live = Carbon::createFromTimestampUTC(config('config.live_at'));

    if($live->lessThan(now()) || config('app.env') == 'local'){
    // if($live->lessThanOrEqualTo(now()) ){
        return app()->make(FrontController::class)->callAction('index', []);
    }

    return view('welcome');
});

Route::get('/preview/{hash}', 'PreviewController');


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
