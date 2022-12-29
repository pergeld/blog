<a
    href="{{ $article->getLink() }}"
    class="flex flex-col items-start p-8 group relative rounded-2xl border border-gray-200 hover:border-gray-900 hover:bg-gray-900 duration-500"
>
    <h2 class="font-bold text-gray-800 group-hover:text-gray-200">{{ $article->title }}</h2>

    <p class="relative z-10 mt-2 text-sm text-gray-600 group-hover:text-gray-400">
        {{ $article->lead }}
    </p>

    <time
        class="mt-3 flex items-center text-xs text-gray-400"
        datetime="{{ $article->published_at->format('Y-m-d H:i') }}"
    >
        {{ $article->published_at->translatedFormat('Y. F j.') }}
    </time>
</a>
