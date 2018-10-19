<a href="{{$offer->url}}" target="_blank" class="max-w-md w-full bg-white lg:flex border border-grey-light rounded mb-2 no-underline hover:shadow-md border-l-4">
    <div class="h-16 w-16 p-2 flex items-center bg-cover text-center overflow-hidden" >
        <img src="{{ $offer->product->logoUrl }}" alt="">
    </div>
    <div class="p-2 flex flex-col justify-between leading-normal w-full">
        <div class="flex items-baseline justify-between">
            <div class="text-black font-bold text-lg">{{ $offer->title }} - <span class="text-base font-thin">{{ $offer->product->name }}</span></div>
            <div class="text-grey text-sm"> 
                CODE: <span class="font-bold text-green-dark text-xl">{{ $offer->code }}</span>
            </div>
        </div>
        <div class="text-sm text-grey-dark flex items-baseline justify-between">
            <div class=""> 
                Created by {{ $offer->creator->name }}
            </div>
            <div class=""> 
                Expires in {{ $offer->expiresIn }}
            </div>      
        </div>
    </div>
</a>