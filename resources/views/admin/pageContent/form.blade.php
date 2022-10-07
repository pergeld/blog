<x-admin-layout>
    <div class="px-0 sm:px-6 lg:px-8">
        <div class="sm:flex-auto mb-6">
            @if ($pageContent->exists)
                <h1 class="text-xl font-semibold text-gray-900">Tartalom szerkesztése</h1>
            @else
                <h1 class="text-xl font-semibold text-gray-900">Tartalom létrehozása</h1>
            @endif

        </div>

        <page-content-form
            csrf="{{ csrf_token() }}"
            back-link="/admin/pageContents/list"
            :page-content='@json(new \App\Http\Resources\PageContentResource($pageContent))'
            submit-url="@if ($pageContent->exists) /admin/pageContents/{{$pageContent->id}} @else /admin/pageContents/store @endif"
        ></page-content-form>
    </div>
</x-admin-layout>
