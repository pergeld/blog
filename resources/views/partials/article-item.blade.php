<article class="md:grid md:grid-cols-4 md:items-baseline">
    <div class="md:col-span-3 group relative flex flex-col items-start">
        <h2 class="text-base font-semibold tracking-tight text-zinc-800 dark:text-zinc-100">
            <div class="absolute -inset-y-6 -inset-x-4 z-0 scale-95 bg-zinc-50 opacity-0 transition group-hover:scale-100 group-hover:opacity-100 dark:bg-zinc-800/50 sm:-inset-x-6 sm:rounded-2xl"></div>
            <a href="#">
                <span class="absolute -inset-y-6 -inset-x-4 z-20 sm:-inset-x-6 sm:rounded-2xl"></span>
                <span class="relative z-10">{{ $article->title }}</span>
            </a>
        </h2>

        <time
            class="md:hidden relative z-10 order-first mb-3 flex items-center text-sm text-zinc-400 dark:text-zinc-500 pl-3.5"
            datetime="{{ $article->published_at->format('Y-m-d H:i') }}"
        >
            <span class="absolute inset-y-0 left-0 flex items-center" aria-hidden="true">
                <span class="h-4 w-0.5 rounded-full bg-zinc-200 dark:bg-zinc-500"></span>
            </span>
            {{ $article->published_at->translatedFormat('Y. F j.') }}
        </time>

        <p class="relative z-10 mt-2 text-sm text-zinc-600 dark:text-zinc-400">
            {{ $article->lead }}
        </p>
    </div>

    <time
        class="mt-1 hidden md:block relative z-10 order-first mb-3 flex items-center text-sm text-zinc-400 dark:text-zinc-500"
        datetime="{{ $article->published_at->format('Y-m-d H:i') }}"
    >
        {{ $article->published_at->translatedFormat('Y. F j.') }}
    </time>
</article>
