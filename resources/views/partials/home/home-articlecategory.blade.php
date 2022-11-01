<div class="container mt-64 flex justify-between items-center mx-auto px-8 md:px-14 lg:px-24 w-full">
    <section class="w-full">
        <h2 id="category" class="secondary-title mb-12">Témák</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 flex justify-center text-center gap-6">
            @foreach ($articleCategories as $articleCategory)
                @include('partials.home-articlecategory-item')
            @endforeach
        </div>
    </section>
</div>
