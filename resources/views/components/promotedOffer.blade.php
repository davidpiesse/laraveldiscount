<div class="h-full w-full flex border border-green rounded shadow">
    <div class="h-auto lg:w-48 py-4 pl-4 flex items-center bg-cover text-center overflow-hidden">
        <img src="{{ $offer->product->logoUrl }}" alt="">
    </div>
    <div class="bg-white w-full p-4 flex flex-col justify-around leading-normal">
        <div class="mb-8">
        <div class="text-black font-bold text-xl mb-2">{{$offer->title}}</div>
        <p class="text-grey-darker text-base">{{ $offer->product->description }}</p>
        <p class="text-sm text-grey-dark flex items-center">
            Offer expires in {{ $offer->expiresIn }} days
        </p>
        </div>
        <div class="flex items-center">
        <img class="w-10 h-10 rounded-full mr-4" src="{{ $offer->creator->smallAvatar() }}" alt="{{ $offer->creator->name }}">
        <div class="text-sm">
            <p class="text-grey-darker leading-none pb-1">made by</p>
            <p class="text-black leading-none">{{ $offer->creator->name }}</p>
        </div>
        </div>
    </div>
</div>