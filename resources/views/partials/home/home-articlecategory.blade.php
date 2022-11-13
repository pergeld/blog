<section class="py-20 sm:py-32">
    <div class="mx-auto px-4 sm:px-6 md:max-w-2xl md:px-4 lg:max-w-4xl lg:px-12">
        <h2 class="inline-flex items-center rounded-full py-2 px-6 text-blue-600 ring-1 ring-inset ring-blue-600">
            <span class="text-base font-medium tracking-tight">Témáink</span>
        </h2>

        <p class="mt-8 font-display text-4xl font-bold tracking-tight text-slate-900">
            Böngész a kiemelt témáink között, vagy válasz a többi témánkból.
        </p>

        <p class="mt-4 text-lg tracking-tight text-slate-700">
            Rengeteg izgalmas téma közül választhatsz.
        </p>
    </div>

    <div class="mx-auto px-4 sm:px-6 md:max-w-2xl md:px-4 lg:max-w-7xl lg:px-8 mt-16">
        <ol role="list" class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-6 text-sm sm:mt-20 sm:grid-cols-2 md:gap-y-10 lg:max-w-none lg:grid-cols-3">
            @foreach ($articleCategories as $articleCategory)
                @include('partials.home-articlecategory-item')
            @endforeach
        </ol>
    </div>
</section>
