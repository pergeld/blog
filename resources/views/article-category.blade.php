<x-front-layout>
    <section class="mt-16 pb-20 sm:pb-32">
        <div class="mx-auto px-4 sm:px-6 md:max-w-2xl md:px-4 lg:max-w-4xl lg:px-12">
            <h2 class="inline-flex items-center rounded-full py-2 px-6 text-blue-600 ring-1 ring-inset ring-blue-600">
                <span class="text-base font-medium tracking-tight">{{ $articleCategory->title }}</span>
            </h2>

            <p class="mt-8 font-display text-4xl font-bold tracking-tight text-gray-900">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, doloribus!
            </p>
        </div>

        <div class="mx-auto px-4 sm:px-6 md:max-w-2xl md:px-4 lg:max-w-4xl lg:px-12 mt-16">
            <div class="flex max-w-3xl flex-col space-y-8">
                @foreach ($articles as $article)
                    @include('partials.article-mini-item')
                @endforeach
            </div>
        </div>
    </section>
</x-front-layout>
