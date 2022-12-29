<div class="flex flex-col items-center bg-white border rounded-lg shadow-md md:flex-row p-4 hover:bg-gray-100 h-1/3">
    <div class="flex flex-col w-full justify-between leading-normal">
        <div>
            @foreach ($article->tags->take(3) as $tag)
                <a href="#" class="inline-flex items-center rounded-lg bg-blue-50 duration-200 hover:bg-blue-200 px-2 py-0.5 mr-2 text-sm font-medium text-blue-900">
                    {{ $tag->title }}
                </a>
            @endforeach
        </div>

        <a href="{{ $article->getLink() }}">
            <h5 class="mb-2 mt-4 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $article->title }}</h5>

            @if (Route::currentRouteName() != 'home')
                <p class="text-gray-500">
                    {{ $article->lead }}
                </p>
            @endif

            <div class="flex items-center mt-4">
                <img class="h-6 w-6 rounded-full mr-2" src="{{ asset($article->user->getProfilePicture()) }}" alt="{{ optional($article->user)->name }}">

                <div class="text-xs font-semibold">{{ optional($article->user)->name }}</div>

                <svg class="mx-1.5 h-1 w-1 text-gray-500" fill="currentColor" viewBox="0 0 8 8">
                    <circle cx="4" cy="4" r="3" />
                </svg>

                <time datetime="{{ $article->published_at->format('Y-m-d H:i') }}" class="text-gray-800 text-xs">
                    {{ $article->published_at->translatedFormat('Y. M j.') }}
                </time>
            </div>
        </a>
    </div>

    <img class="object-cover w-full rounded-lg h-full w-48" src="{{ $article->getCardCover() }}" alt="{{ $article->title }}">
</div>
