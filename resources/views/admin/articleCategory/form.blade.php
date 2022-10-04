<x-admin-layout>
    <div class="px-0 sm:px-6 lg:px-8">
        <div class="sm:flex-auto mb-6">
            @if ($articleCategory->exists)
                <h1 class="text-xl font-semibold text-gray-900">Hír kategória szerkesztése</h1>
            @else
                <h1 class="text-xl font-semibold text-gray-900">Hír kategória létrehozása</h1>
            @endif

        </div>

        <form action="@if ($articleCategory->exists)
            /admin/articleCategories/{{ $articleCategory->id}}
        @else
            /admin/articleCategories/store
        @endif" method="POST" class="space-y-12" enctype="multipart/form-data">
            @csrf

            <div class="bg-gray-50 px-4 py-6 shadow sm:rounded-lg sm:p-6">
                <div class="xl:grid xl:grid-cols-3 xl:gap-6">
                    <div class="xl:col-span-1">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Adatok</h3>
                        <p class="mt-1 text-sm text-gray-500">A kategória adatai. A megnevezés megadása kötelező.</p>
                    </div>

                    <div class="mt-5 space-y-6 xl:col-span-2 xl:mt-0">

                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Megnevezés</label>
                            <input
                                type="text"
                                name="title"
                                id="title"
                                maxlength="100"
                                value="{{ $articleCategory->title }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            >

                                <div class="mt-2 text-sm text-red-500">
                                    {{ $errors->first('title') }}
                                </div>

                        </div>

                        <div>
                            <div class="flex items-start">
                                <div class="flex h-5 items-center">
                                    <input
                                        id="is_visible"
                                        name="is_visible"
                                        type="checkbox"
                                        value="1"
                                        @if ($articleCategory->is_visible || !$articleCategory->exists) checked="checked" @endif
                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:outline-none focus:ring-0"
                                    >
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="is_visible" class="font-medium text-gray-700">Látható az oldalon?</label>
                                    <p class="text-gray-500">Jelöld be az alábbi checkboxot ahhoz, hogy a hír kategória látható legyen az oldalon.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <a href="/admin/articleCategories/list" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-0">Mégsem</a>
                <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-0">Mentés</button>
            </div>
        </form>
    </div>
</x-admin-layout>