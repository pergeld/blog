<x-front-layout>
    @include('partials.home.banner')
    @includeWhen($articleCategories->isNotEmpty(), 'partials.home.home-articlecategory')
    @includeWhen($articles->isNotEmpty(), 'partials.home.home-articles')
</x-front-layout>
