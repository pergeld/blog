<div class="container mt-64 flex justify-between items-center mx-auto px-8 md:px-14 lg:px-24 w-full">
    <section class="w-full">
        <h2 id="articles" class="secondary-title">Bejegyzések</h2>

        <div class="space-y-12 sm:space-y-16 my-16 bg-white rounded sm:rounded-xl p-8 sm:p-16">
            @foreach ($articles as $article)
                @include('partials.home-article-item')
            @endforeach
        </div>
    </section>
</div>
