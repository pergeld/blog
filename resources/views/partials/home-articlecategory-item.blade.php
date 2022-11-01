<a href="#" class="group aspect-w-10 aspect-h-12 block w-full overflow-hidden rounded-lg @if($loop->index % 2 == 0) rotate-2 @else -rotate-2 @endif">
    <img src="{{ $articleCategory->getCoverPicture() }}" alt="{{ $articleCategory->title }}" class="pointer-events-none w-full h-full inset-0 absolute object-cover group-hover:blur-lg duration-300">

    <div class="absolute top-50 z-10 text-3xl duration-300 opacity-0 group-hover:opacity-100">
        {{ $articleCategory->title }}
    </div>
</a>
