<x-admin-layout>
    <div class="mx-auto max-w-screen-lg">
        <div class="py-6 px-4 sm:p-6 lg:pb-8">
            <div>
                <h2 class="text-lg font-medium leading-6 text-gray-900">Jelszó módosítása</h2>
                <p class="mt-1 text-sm text-gray-500">Itt tudod megváltoztatni a felhasználói fiókodhoz tartozó jelszót.</p>
            </div>

            @if (session('status') === 'password-updated')
                <div class="rounded-md bg-green-100 p-4 my-8 font-medium text-sm text-green-600">
                    Jelszó sikeresen módosítva.
                </div>
            @endif

            <form action="/user/password" method="POST" class="mt-8">
                @csrf
                @method('put')

                <div class="mt-4">
                    <label for="current_password" class="block text-sm font-medium text-gray-700">Jelenlegi jelszó</label>
                    <input
                        type="password"
                        id="current_password"
                        name="current_password"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    >
                    <div class="mt-2 text-sm text-red-500">
                        {{ $errors->first('current_password') }}
                    </div>
                </div>

                <div class="mt-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Új jelszó</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    >
                    <div class="mt-2 text-sm text-red-500">
                        {{ $errors->first('password') }}
                    </div>
                </div>

                <div class="mt-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Új jelszó ismét</label>
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    >
                    <div class="mt-2 text-sm text-red-500">
                        {{ $errors->first('password_confirmation') }}
                    </div>
                </div>

                <div class="flex justify-end mt-12">
                    <a href="/profile" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-0">Mégsem</a>
                    <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-gray-900 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-0">Mentés</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
