<div class="flex-cols">
    <img 
        class="w-24 h-24 mt-4 rounded bg-white border" 
        src="{{ $offer->product->logoUrl }}" alt="{{ $offer->product->name }}">
    </img>
    <p class="text-center text-grey-dark font-thin">{{$offer->product->name}}</p>
</div>