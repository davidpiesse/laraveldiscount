<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
</head>
<body class="bg-grey-lighter font-sans font-normal antialiased">

    <div class="container mx-auto h-full bg-white pt-6">
        <div class="flex justify-center items-center mb-4">
            <div class="pr-4">    
                <logo class="text-grey-darker w-16 animated jackInTheBox slow"/>            
            </div>
            <div class="text-grey-darker text-center font-thin tracking-wide text-3xl">Laravel Discount</div>
        </div>

        {{--  Promoted  --}}
        <div class="mb-4 flex items-stretch">
            <div class="w-1/2 px-4">
                <promoted-offer :offer="$promotedOffer"></promoted-offer>
            </div>
            <div class="w-1/2 px-4 flex-col justify-around">
                @foreach($topOffers as $offer)
                    <top-offer :offer="$offer"></top-offer>
                @endForeach
            </div>
        </div>

        {{--  Active  --}}
        <div class="w-full text-center text-grey-dark">Active Offers</div>
        <div class="mb-4 flex px-4">

            @foreach($activeOffers as $offer)
            <div class="w-1/3 p-2">    
                <box-offer :offer="$offer"></box-offer>
            </div>
            @endForeach

            
        </div>

        {{--  Expiring  --}}
        <div class="w-full text-center text-grey-dark">Offers Expiring Soon</div>
        <div class="mb-4 flex px-4">
            @foreach($expiringOffers as $offer)
            <div class="w-1/3 p-2">    
                <box-offer :offer="$offer"></box-offer>
            </div>
            @endForeach
        </div>

        {{--  Upcoming  --}}
        <div class="w-full text-center text-grey-dark">Upcoming Product Offers</div>
        <div class="mb-4 flex px-4 justify-around">
            @foreach($upcomingOffers as $offer)
                <upcoming-offer :offer="$offer"></upcoming-offer>
            @endForeach
        </div>
    </div>

    {{--  <div class="flex flex-col">
        <div class="min-h-screen flex items-center justify-center">
            <div class="flex flex-col justify-around h-full items-center">
                <h1 class="text-grey-darker text-center font-thin tracking-wide text-5xl mb-6">
                    Laravel Discount
                </h1>

                @php
                    $message = "Hi X"; 
                @endphp

                <my-alert type="error" :message="$message" class="text-grey-darker text-center font-thin tracking-wide text-xl mb-6" />
            </div>
        </div>
    </div>  --}}


</body>
</html>
