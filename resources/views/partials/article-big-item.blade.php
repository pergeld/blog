<div class="bg-white hover:bg-gray-100 border border-gray-200 rounded-lg shadow-md">
    <a href="{{ $article->getLink() }}">
        <img class="rounded-t-lg" src="{{ $article->getCardCover() }}" alt="{{ $article->title }}" />
    </a>
    <div class="p-5">
        @foreach ($article->tags->take(3) as $tag)
            <a href="#" class="inline-flex items-center rounded-lg bg-blue-50 duration-200 hover:bg-blue-200 px-2 py-0.5 mr-2 text-sm font-medium text-blue-900">
                {{ $tag->title }}
            </a>
        @endforeach

        <a href="{{ $article->getLink() }}" class="flex flex-col mt-4">

        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900">{{ $article->title }}</h5>

        <p class="mb-4 text-sm font-normal text-gray-500">{{ $article->lead }}</p>

        <div class="flex">
            <img class="h-8 w-8 rounded-full mr-2" src="{{ asset($article->user->getProfilePicture()) }}" alt="{{ optional($article->user)->name }}">

            <div class="flex flex-col">
                <div class="text-sm font-semibold">{{ optional($article->user)->name }}</div>

                <time datetime="{{ $article->published_at->format('Y-m-d H:i') }}" class="text-gray-800 text-xs">
                    {{ $article->published_at->translatedFormat('Y. M j.') }}
                </time>
            </div>
        </div>

        </a>
    </div>
</div>
