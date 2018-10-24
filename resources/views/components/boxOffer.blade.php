<a alt="{{ $offer->product->name}}" href="{{$offer->url}}" target="_blank" class="max-w-md w-full h-full lg:flex border border-grey-light rounded mb-2 bg-white no-underline hover:shadow-md">
    <div class="h-16 w-16 p-2 flex items-center bg-cover text-center overflow-hidden" >
        <img src="{{ $offer->product->logoUrl }}" alt="">
    </div>
    <div class="p-2 flex flex-col justify-between leading-normal w-full">
        <div class="flex items-baseline justify-between">
            <div class="text-black font-bold text-md">{{ $offer->title }} - <span class="text-base font-thin">{{ $offer->product->name }}</span></div>
            @if($offer->hasDescription)
            <div class="text-grey text-xs text-right"> 
                {{$offer->description}}
            </div>
            @elseif($offer->hasCode)
            <div class="text-grey text-xs text-right"> 
                Use Code: <span class="font-bold text-green-dark text-xl">{{ $offer->code }}</span>
            </div>
            @endif
        </div>
        <div class="text-xs text-grey-dark text-right">
            Expires in {{ $offer->expiresIn }}
        </div>
    </div>
</a>