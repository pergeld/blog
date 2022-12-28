<x-front-layout>
    <article class="mt-32 pb-20">
        @if (! $article->isPublished())
            <div class="mx-auto md:max-w-2xl lg:max-w-4xl mb-12 -mt-12">
                <div class="rounded-md bg-red-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M8.485 3.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 3.495zM10 6a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 6zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">Ez a bejegyzés nem publikus!</h3>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="mx-auto px-4 sm:px-6 md:max-w-2xl md:px-4 lg:max-w-4xl lg:px-12">
            <h2 class="inline-flex items-center rounded-full py-2 px-6 text-blue-600 ring-1 ring-inset ring-blue-600">
                <span class="text-base font-medium tracking-tight">{{ $article->articleCategory->title }}</span>
            </h2>

            <p class="mt-8 font-display text-4xl font-bold tracking-tight text-gray-900">
                {{ $article->title }}
            </p>

            <p class="mt-6 border-l border-gray-300 pl-2 text-sm text-gray-400">
                <time datetime="{{ $article->published_at->format('Y-m-d H:i') }}">
                    {{ $article->published_at->translatedFormat('Y. F j.') }}
                </time>
            </p>

            <div class="mt-6 text-gray-600">
                {{ $article->lead }}
            </div>

            @if ($cover = $article->getCover())
              <img
                src="{{ $article->getCover() }}"
                alt="{{ $article->title }}"
                class="mt-12">
            @endif


            <div class="mt-12">
                {!! $article->content !!}
            </div>

            @if (! empty($article->tags))
                <div class="mt-12">
                    @foreach ($article->tags as $tag)
                        <a href="#" class="inline-flex items-center rounded bg-blue-50 duration-200 hover:bg-blue-200 px-2 py-0.5 mr-2 text-sm font-medium text-blue-900">
                            <svg class="mr-1.5 h-2 w-2 text-indigo-400" fill="currentColor" viewBox="0 0 8 8">
                                <circle cx="4" cy="4" r="3" />
                            </svg>
                            {{ $tag->title }}
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </article>
</x-front-layout>
