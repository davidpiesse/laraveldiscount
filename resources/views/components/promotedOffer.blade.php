<a href="{{ $offer->url }}" 
    target="_blank" 
    class="h-full w-full flex border border-l-8 border-green rounded shadow-md no-underline hover:shadow-lg animated pulse delay-2s">
    <div class="h-auto lg:w-48 py-4 pl-4 flex items-center bg-cover text-center overflow-hidden">
        <img class="rounded" src="{{ $offer->product->logoUrl }}" alt="">
    </div>
    <div class=" w-full p-4 flex flex-col justify-around leading-normal">
        <div class="mb-8 block">
            <div class="text-black font-bold text-xl mb-2">{{$offer->title}} 
                <span class="text-grey-dark font-thin text-sm">[{{ $offer->product->description }}]</span>
            </div>
            @if($offer->hasCode)
            <p class="text-sm text-grey-dark flex items-center mb-2">
                CODE: <span class="font-bold text-green-dark text-xl">{{ $offer->code }}</span>
            </p>
            @endif
            <p class="text-sm text-grey-dark flex items-center mb-2 italic">
                Offer expires in {{ $offer->expiresIn }}
            </p>
        </div>

        <div class="flex items-center">
            <img class="w-10 h-10 rounded-full mr-4" src="{{ $offer->creator->avatarUrl() }}" alt="{{ $offer->creator->name }}">
            <div class="text-sm">
                <p class="text-grey-darker leading-none pb-1">made by</p>
                <p class="text-black leading-none">{{ $offer->creator->name }}</p>
            </div>
        </div>
    </div>
</a>