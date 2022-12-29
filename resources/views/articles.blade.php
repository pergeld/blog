<x-front-layout>
    <section class="mt-16 pb-20 sm:pb-32">
        <div class="mx-auto px-4 sm:px-6 md:max-w-2xl md:px-4 lg:max-w-4xl lg:px-12">
            <h2 class="inline-flex items-center rounded-full py-2 px-6 text-blue-600 ring-1 ring-inset ring-blue-600">
                <span class="text-base font-medium tracking-tight">Blog</span>
            </h2>

            <p class="mt-8 font-display text-4xl font-bold tracking-tight text-gray-900">
                Válogass blog bejegyzéseink közül.
            </p>
        </div>

        <div class="mx-auto px-4 sm:px-6 md:max-w-2xl md:px-4 lg:max-w-4xl lg:px-12 mt-16">
            <div class="md:border-l md:border-gray-100 md:pl-6">
                <div class="flex max-w-3xl flex-col space-y-16">
                    @foreach ($articles as $article)
                        @include('partials.article-item')
                    @endforeach
                </div>
            </div>

            <div class="mt-16">
                {{ $articles->links() }}
            </div>
        </div>
    </section>
</x-front-layout>
