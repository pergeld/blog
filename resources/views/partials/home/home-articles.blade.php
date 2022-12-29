<section class="pb-20 sm:pb-32">
    <div class="mx-auto px-4 sm:px-6 md:max-w-2xl md:px-4 lg:max-w-7xl lg:px-12">
        <h2 class="inline-flex items-center rounded-full py-2 px-6 text-blue-600 ring-1 ring-inset ring-blue-600">
            <a href="{{ route('articles') }}" class="text-base font-medium tracking-tight">Blog</a>
        </h2>

        <p class="mt-8 font-display text-4xl font-bold tracking-tight text-gray-900">
            Olvasd el a legújabb bejegyzéseket.
        </p>

        <p class="mt-4 text-lg tracking-tight text-gray-700">
            Vagy böngész további bejegyzéseink közül, különböző témákban, időrendi sorrendben.
        </p>
    </div>

    <div class="mx-auto px-4 sm:px-6 md:px-4 md:max-w-2xl lg:max-w-7xl mt-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 2xl:gap-7">
            <div>
                @foreach ($articles->take(1) as $article)
                    @include('partials.article-big-item')
                @endforeach
            </div>

            <div class="flex flex-col space-y-6">
                @foreach ($articles->skip(1) as $article)
                    @include('partials.article-item')
                @endforeach
            </div>
        </div>
    </div>
</section>
