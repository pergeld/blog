<article class="group relative flex flex-col items-start">
    <h2 class="text-base font-semibold tracking-tight text-gray-800">
        <div class="absolute -inset-y-6 -inset-x-4 z-0 scale-95 bg-gray-50 opacity-0 transition group-hover:scale-100 group-hover:opacity-100 sm:-inset-x-6 sm:rounded-2xl"></div>
        <a href="#">
            <span class="absolute -inset-y-6 -inset-x-4 z-20 sm:-inset-x-6 sm:rounded-2xl"></span>
            <span class="relative z-10">{{ $article->title }}</span>
        </a>
    </h2>

    <time class="relative z-10 order-first mb-3 flex items-center text-sm text-gray-400 pl-3.5" datetime="{{ $article->published_at->format('Y-m-d H:i') }}">
        <span class="absolute inset-y-0 left-0 flex items-center" aria-hidden="true">
            <span class="h-4 w-0.5 rounded-full bg-gray-200"></span>
        </span>
        {{ $article->published_at->translatedFormat('Y. F j.') }}
    </time>

    <p class="relative z-10 mt-2 text-sm text-gray-600">
        {{ $article->lead }}
    </p>

    <div class="relative z-10 mt-4 flex items-center text-sm font-medium text-gray-500">
        Read article
    </div>
</article>
