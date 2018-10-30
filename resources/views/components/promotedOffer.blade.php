<a href="{{ $offer->url }}" 
    target="_blank" 
    class="h-full w-full block lg:flex border border-l-8 border-green rounded shadow-md no-underline hover:shadow-lg animated pulse delay-2s">
    <div class="h-auto w-full lg:w-1/3 p-4 lg:py-4 lg:pl-4 flex items-center bg-cover text-center overflow-hidden">
        <img class="rounded" src="{{ $offer->product->logoUrl }}" alt="" class="content-center">
    </div>
    <div class=" w-full p-4 flex flex-col justify-around leading-normal">
        <div class="mb-8 block">
            <div class="text-black font-bold text-xl mb-2">{{$offer->title}} 
                <span class="text-grey-darker font-thin">{{ $offer->product->name }}</span>
            </div>
            @if($offer->hasDescription)
            <p class="text-sm text-grey-darker mb-2">
                {{$offer->description}}
            </p>
            @elseif($offer->hasCode)
            <p class="text-sm text-grey-darker mb-2">
                Use Code: <span class="font-bold text-green-dark text-xl">{{ $offer->code }}</span>
            </p>
            @endif
            <p class="text-sm text-grey mb-2 italic">
                Offer {{ $offer->expiresIn }}
            </p>
        </div>

        <div class="flex items-center justify-end text-right">
            <div class="text-sm">
                <p class="text-grey-darker leading-none pb-1">made by</p>
                <p class="text-black leading-none">{{ $offer->creator->name }}</p>
            </div>
            <img class="w-10 h-10 rounded-full mx-4" src="{{ $offer->creator->avatarUrl }}" alt="{{ $offer->creator->name }}" />
        </div>
    </div>
</a>