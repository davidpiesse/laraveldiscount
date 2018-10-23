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

    <div class="container mx-auto h-full bg-white py-6 px-4">
        <div class="flex justify-center items-center mb-4">
            <div class="pr-4">    
                <logo class="text-grey-darker w-16 animated jackInTheBox slow"/>            
            </div>
            <div class="text-grey-darker text-center font-thin tracking-wide text-3xl">Laravel Discount</div>
        </div>

        <div class="pb-4 text-center font-hairline text-xl tracking-wide text-grey-darkest">
            Preview Page for Creators
        </div>

        <div class="bg-grey-lightest rounded w-full p-4">
            <h3>Creator</h3>
            <ul class="list-reset bg-white rounded py-2">
                <li>{{$creator->name}}</li>
                <li>
                    <img 
                        class="w-24 h-24 rounded-full bg-grey-lighter border-2" 
                        src="{{ cloudinary_image($creator->avatar) }}" alt="{{ $creator->avatar }}" />
                </li>
            </ul>
        </div>

        <div class="bg-grey-lightest rounded w-full p-4">
            <h3 class="mb-2">Products</h3>

            @foreach($creator->products as $product)
            <div class="py-2 bg-white rounded">
                <ul class="list-reset">
                    <li><h4>{{$product->name}}</h4></li>
                    <li>{{$product->description}}</li>
                    <li><a href="{{$product->link}}" target="_blank">{{$product->link}}</a></li>
                    <li>{{$product->category}}</li>
                    <li>
                        <img 
                            class="w-24 h-24 rounded-full bg-grey-lighter border-2" 
                            src="{{ $product->logoUrl }}" alt="{{ $product->logoUrl }}" />
                    </li>
                </ul>
            </div>
            @endforeach
        </div>

        <div class="bg-grey-lightest rounded w-full p-4">
            <h3 class="mb-2">Offers</h3>

            @foreach($creator->offers as $offer)
            {{--  {{dd($offer)}}  --}}
            <div class="py-2 bg-white rounded">
                <ul class="list-reset">
                    <li>For {{ $offer->product->name }}</li>
                    <li>{{$offer->title}}</li>
                    <li><a href="{{$offer->url}}" target="_blank">{{$offer->url}}</a></li>
                    <li>Starts: {{$offer->start_time->toFormattedDateString()}}</li>
                    <li>Ends: {{$offer->end_time->toFormattedDateString()}}</li>
                    <li>Code: {{$offer->code}}</li>
                </ul>
            </div>
            <div class="py-2 bg-white rounded w-1/2"> 
                <promoted-offer :offer="$offer"></promoted-offer>
            </div>
            <div class="py-2 bg-white rounded w-1/2"> 
                <top-offer :offer="$offer"></top-offer>
            </div>
            <div class="py-2 bg-white rounded w-1/3"> 
                <box-offer :offer="$offer"></box-offer>
            </div>
            @endforeach
        </div>

    </div>
</body>
</html>
