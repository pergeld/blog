<x-admin-layout>
    <div class="px-0 sm:px-6 lg:px-8">
        <div class="sm:flex-auto mb-6">
            <h1 class="text-xl font-semibold text-gray-900">Felhasználó létrehozása</h1>
        </div>

        <form action="/admin/users/store" method="POST" class="space-y-12" enctype="multipart/form-data">
            @csrf

            <div class="bg-gray-50 px-4 py-6 shadow sm:rounded-lg sm:p-6">
                <div class="xl:grid xl:grid-cols-3 xl:gap-6">
                    <div class="xl:col-span-1">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Adatok</h3>
                        <p class="mt-1 text-sm text-gray-500">A felhasználó adatai.</p>
                    </div>

                    <div class="mt-5 space-y-6 xl:col-span-2 xl:mt-0">

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Név</label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                maxlength="100"
                                value="{{ old('name') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            >

                                <div class="mt-2 text-sm text-red-500">
                                    {{ $errors->first('name') }}
                                </div>

                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                maxlength="100"
                                value="{{ old('email') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            >

                                <div class="mt-2 text-sm text-red-500">
                                    {{ $errors->first('email') }}
                                </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="bg-gray-50 px-4 py-6 shadow sm:rounded-lg sm:p-6">
                <div class="xl:grid xl:grid-cols-3 xl:gap-6">
                    <div class="xl:col-span-1">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Jelszó</h3>
                        <p class="mt-1 text-sm text-gray-500"></p>
                    </div>

                    <div class="mt-5 space-y-6 xl:col-span-2 xl:mt-0">

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Jelszó</label>
                            <input
                                type="password"
                                name="password"
                                id="password"
                                maxlength="100"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            >

                                <div class="mt-2 text-sm text-red-500">
                                    {{ $errors->first('password') }}
                                </div>

                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Jelszó ismét</label>
                            <input
                                type="password"
                                name="password_confirmation"
                                id="password_confirmation"
                                maxlength="100"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            >

                                <div class="mt-2 text-sm text-red-500">
                                    {{ $errors->first('password_confirmation') }}
                                </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="bg-gray-50 px-4 py-6 shadow sm:rounded-lg sm:p-6">
                <div class="xl:grid xl:grid-cols-3 xl:gap-6">
                    <div class="xl:col-span-1">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Szerepkör</h3>
                        <p class="mt-1 text-sm text-gray-500">Válaszd ki, hogy az adott felhasználó melyik szerepkörbe tartozzon.</p>
                    </div>
                    <div class="mt-5 space-y-6 xl:col-span-2 xl:mt-0">

                        <div class="flex items-start">
                            <select
                                name="roles[]"
                                id="roles"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            >
                                @foreach ($roles as $role)
                                    <option value="{{ $role }}">{{ $role }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <a href="/admin/users/list" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-0">Mégsem</a>
                <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-0">Mentés</button>
            </div>
        </form>
    </div>
</x-admin-layout>
