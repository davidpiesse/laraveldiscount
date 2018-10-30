@extends('main')

@section('content')
    {{--  <div class="box">  --}}
        {{--  </div>  --}}
    <a class="fixed pin-t pin-r mt-32 no-underline z-10" href="https://goo.gl/forms/FY2WPOq5UuitWdn43" target="_blank">
        <div class="sticky bg-red text-white p-2 rounded-l">ADD YOUR<br>PROMOTION</div>
    </a>   

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
        <div class="md:hidden">
            <div class="pb-4 text-center font-hairline text-xl tracking-wide text-red-dark">
                This site is not yet responsive :(
            </div>
        </div>

        <div class="mb-2 block lg:flex items-stretch">
            <div class="w-full lg:w-1/2 px-4 mb-2">
                <promoted-offer :offer="$promotedOffer"></promoted-offer>
            </div>
            <div class="w-full lg:w-1/2 px-4">
                <div class="h-full flex-col justify-between">
                    @foreach($topOffers as $offer)
                        <top-offer :offer="$offer"></top-offer>
                    @endForeach
                </div>
            </div>
        </div>

        <div class="w-full text-center text-grey-dark">Active Offers</div>
        <div class="mb-4 flex flex-wrap justify-center px-4">
            @forelse($activeOffers as $offer)
            <div class="w-full lg:w-1/3 p-2 self-stretch">    
                <box-offer :offer="$offer"></box-offer>
            </div>
            @empty
                <p class="font-thin text-grey-darker leading-loose">No active offers right now...</p>
            @endforelse
        </div>

        <div class="w-full text-center text-grey-dark">Offers Expiring Soon</div>
        <div class="mb-4 flex flex-wrap justify-center px-4">
            @forelse($expiringOffers as $offer)
            <div class="w-1/3 p-2 ">    
                <box-offer :offer="$offer"></box-offer>
            </div>
            @empty
                <p class="font-thin text-grey-darker leading-loose">No offers are due to expire soon</p>
            @endforelse
        </div>

        <div class="w-full text-center text-grey-dark">Upcoming Product Offers</div>
        <div class="mb-4 flex px-4 flex-wrap justify-around">
            @foreach($upcomingOffers as $offer)
                <upcoming-offer :offer="$offer"></upcoming-offer>
            @endForeach
        </div>
    </div>
@endsection