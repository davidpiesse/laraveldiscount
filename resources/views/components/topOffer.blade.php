<a href="{{$offer->url}}" target="_blank" class="w-full bg-white flex border border-grey-light rounded mb-2 no-underline hover:shadow-md border-l-4">
    <div class="h-16 w-16 p-2 flex items-center bg-cover text-center overflow-hidden" >
        <img src="{{ $offer->product->logoUrl }}" alt="">
    </div>
    <div class="p-2 flex flex-col justify-between leading-normal w-full">
        <div class="flex items-baseline justify-between">
            <div class="text-black font-bold text-lg">{{ $offer->title }} - <span class="text-base font-thin text-grey-darker">{{ $offer->product->name }}</span></div>
            @if($offer->hasDescription)
            <p class="text-sm text-grey-darker mb-2">
                {{$offer->description}}
            </p>
            @elseif($offer->hasCode)
            <p class="text-sm text-grey-darker mb-2">
                Use Code: <span class="font-bold text-green-dark text-xl">{{ $offer->code }}</span>
            </p>
            @endif
        </div>
        <div class="text-sm text-grey-dark flex items-baseline justify-between">
            <div class="flex items-start"> 
                Created by {{ $offer->creator->name }} 
                <img class="ml-2" src="{{$offer->creator->avatarUrl}}" width="24" height="24" alt="">
            </div>
            <div class="italic text-grey"> 
                {{ ucfirst($offer->expiresIn) }}
            </div>      
        </div>
    </div>
</a>