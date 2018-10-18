<?php

use App\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\FrontController;

Route::get('/', function (Request $request){

    $live = Carbon::createFromTimestampUTC(config('config.live_at'));

    if($live->lessThan(now()) || config('app.env') == 'local'){
        return app()->make(FrontController::class)->callAction('index', []);
    }

    return view('welcome');
});


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
