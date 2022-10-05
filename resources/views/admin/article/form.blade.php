<x-admin-layout>
    <div class="px-0 sm:px-6 lg:px-8">
        <div class="sm:flex-auto mb-6">
            @if ($article->exists)
                <h1 class="text-xl font-semibold text-gray-900">Hír szerkesztése</h1>
            @else
                <h1 class="text-xl font-semibold text-gray-900">Hír létrehozása</h1>
            @endif

        </div>

        <article-form
            csrf="{{ csrf_token() }}"
            back-link="/admin/articles/list"
            :article='@json(new \App\Http\Resources\ArticleResource($article))'
            :article-categories='@json(\App\Http\Resources\ArticleCategoryResource::collection($articleCategories))'
            submit-url="@if ($article->exists) /admin/articles/{{$article->id}} @else /admin/articles/store @endif"
        ></article-form>
    </div>
</x-admin-layout>
