<section class="py-20 sm:py-32">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl sm:text-center">
            <h2 class="text-3xl font-medium tracking-tight text-gray-900">Témáink</h2>

            <p class="mt-2 text-lg text-gray-600">
                Böngész a kiemelt témáink között, vagy válasz a többi témánkból.
            </p>
        </div>

        <div role="list" class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-6 text-sm sm:mt-20 sm:grid-cols-2 md:gap-y-10 lg:max-w-none lg:grid-cols-3">
            @foreach ($articleCategories as $articleCategory)
                @include('partials.home-articlecategory-item')
            @endforeach
        </div>
    </div>
</section>
