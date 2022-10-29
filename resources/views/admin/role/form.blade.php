<x-admin-layout>
    <div class="px-0 sm:px-6 lg:px-8">
        <div class="sm:flex-auto mb-6">
            @if ($role->exists)
                <h1 class="text-xl font-semibold text-gray-900">Szerepkör szerkesztése</h1>
            @else
                <h1 class="text-xl font-semibold text-gray-900">Szerepkör létrehozása</h1>
            @endif
        </div>

        <form action="@if ($role->exists)
            /admin/roles/{{ $role->id}}
        @else
            /admin/roles/store
        @endif" method="POST" class="space-y-12" enctype="multipart/form-data">
            @csrf

            <div class="bg-gray-50 px-4 py-6 shadow sm:rounded-lg sm:p-6">
                <div class="xl:grid xl:grid-cols-3 xl:gap-6">
                    <div class="xl:col-span-1">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Adatok</h3>
                        <p class="mt-1 text-sm text-gray-500">A szerepkör adatai.</p>
                    </div>

                    <div class="mt-5 space-y-6 xl:col-span-2 xl:mt-0">

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Megnevezés</label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                maxlength="100"
                                value="{{ $role->name }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            >

                                <div class="mt-2 text-sm text-red-500">
                                    {{ $errors->first('name') }}
                                </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="bg-gray-50 px-4 py-6 shadow sm:rounded-lg sm:p-6">
                <div class="xl:grid xl:grid-cols-3 xl:gap-6">
                    <div class="xl:col-span-1">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Engedélyek</h3>
                        <p class="mt-1 text-sm text-gray-500">Válaszd ki, hogy az adott szerepkörhöz melyik engedélyezk tartozzanak.</p>
                    </div>
                    <div class="mt-5 space-y-6 xl:mt-0">

                        <div class="mt-4 divide-y divide-gray-200 border-t border-b border-gray-200">
                            @foreach ($permissions as $permission)
                                <div class="relative flex items-start py-4">
                                    <div class="min-w-0 flex-1 text-sm">
                                        <label for="permission{{ $permission->id }}" class="select-none font-medium text-gray-700">{{ $permission->name }}</label>
                                    </div>
                                    <div class="ml-3 flex h-5 items-center">
                                        <input
                                            id="permission{{ $permission->id }}"
                                            name="permission[]"
                                            value="{{ $permission->id }}"
                                            @if ($role->permissions->contains($permission->id)) checked="checked" @endif
                                            type="checkbox"
                                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-0"
                                        >
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-2 text-sm text-red-500">
                            {{ $errors->first('permission') }}
                        </div>

                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <a href="/admin/users/list" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-0">Mégsem</a>
                <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-gray-900 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-0">Mentés</button>
            </div>
        </form>
    </div>
</x-admin-layout>
