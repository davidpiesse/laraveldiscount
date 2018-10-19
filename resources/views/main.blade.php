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
<body class="bg-grey-lighter font-sans font-normal antialiased h-full">

    <div class="container mx-auto h-full bg-white pt-6">
        <div class="flex justify-center items-center mb-4">
            <div class="pr-4">    
                <logo class="text-grey-darker w-16 animated jackInTheBox slow"/>            
            </div>
            <div class="text-grey-darker text-center font-thin tracking-wide text-3xl">Laravel Discount</div>
        </div>

        <div class="pb-4 text-center font-hairline text-xl tracking-wide text-grey-darkest">
            Discounts for the Laravel community - all in one place
        </div>

        {{--  Promoted  --}}
        <div class="mb-4 flex items-stretch">
            <div class="w-1/2 px-4">
                <promoted-offer :offer="$promotedOffer"></promoted-offer>
            </div>
            <div class="w-1/2 px-4">
                <div class="h-full flex-col justify-between">
                    @foreach($topOffers as $offer)
                        <top-offer :offer="$offer"></top-offer>
                    @endForeach
                </div>
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
</body>
</html>
