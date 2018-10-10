<div class="max-w-md w-full lg:flex border border-grey-light rounded mb-2">
    <div class="h-16 w-16 p-2 flex items-center bg-cover text-center overflow-hidden" >
        <img src="{{ $offer->product->logoUrl }}" alt="">
    </div>
    <div class="bg-white p-2 flex flex-col justify-between leading-normal">
        <div class="">
            <div class="text-black font-bold text-lg mb-2">{{ $offer->title }}</div>
            <span class="text-sm text-grey-dark flex items-center">
                Expires in {{ $offer->expiresIn }} days
            </span>
        </div>
    </div>
</div>