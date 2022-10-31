<x-admin-layout>
    <div class="px-0 sm:px-6 lg:px-8">
        <div class="sm:flex-auto mb-6">
            @if ($articleCategory->exists)
                <h1 class="text-xl font-semibold text-gray-900">Hír kategória szerkesztése</h1>
            @else
                <h1 class="text-xl font-semibold text-gray-900">Hír kategória létrehozása</h1>
            @endif

        </div>

        <article-category-form
            csrf="{{ csrf_token() }}"
            back-link="/admin/articleCategories/list"
            :article-category='@json(new \App\Http\Resources\ArticleCategoryResource($articleCategory))'
            submit-url="@if ($articleCategory->exists) /admin/articleCategories/{{ $articleCategory->id }} @else /admin/articleCategories/store @endif"
        ></article-category-form>
    </div>
</x-admin-layout>
