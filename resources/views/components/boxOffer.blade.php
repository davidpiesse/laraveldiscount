<a alt="{{ $offer->product->name}}" href="{{$offer->url}}" target="_blank" class="max-w-md w-full h-full lg:flex border border-grey-light rounded mb-2 bg-white no-underline hover:shadow-md">
    <div class="h-16 w-16 p-2 flex items-center bg-cover text-center overflow-hidden" >
        <img src="{{ $offer->product->logoUrl }}" alt="">
    </div>
    <div class="p-2 flex flex-col justify-between leading-normal w-full">
        <div class="flex items-baseline justify-between">
            <div class="text-black font-bold text-md"><span class="text-base font-thin">{{ $offer->product->name }}</span> - {{ $offer->title }}</div>
            @if($offer->hasCode)
            <div class="text-grey text-xs text-right"> 
                CODE: <span class="font-bold text-green-dark text-base">{{ $offer->code }}</span>
            </div>
            @endif
        </div>
        <div class="text-xs text-grey-dark text-right">
            Expires in {{ $offer->expiresIn }}
        </div>
    </div>
</a>