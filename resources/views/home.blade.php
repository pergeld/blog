<x-front-layout>
    @include('partials.home.banner')
    @includeWhen($articleCategories->isNotEmpty(), 'partials.home.home-articlecategory')
</x-front-layout>
