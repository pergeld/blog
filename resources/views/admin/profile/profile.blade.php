<x-admin-layout>
<div class="mx-auto max-w-screen-lg">
    <div class="py-6 px-4 sm:p-6 lg:pb-8">
        <div>
            <h2 class="text-lg font-medium leading-6 text-gray-900">Profil</h2>
            <p class="mt-1 text-sm text-gray-500">Itt tudod megváltoztatni a profilod adatait.</p>
        </div>

        @if (session('status') === 'profile-information-updated')
            <div class="rounded-md bg-green-100 p-4 my-8 font-medium text-sm text-green-600">
                Profil sikeresen frissítve.
            </div>
        @endif

        <form action="/user/profile-information" method="POST">
            @csrf
            @method('put')

            <div class="mt-6 flex flex-col lg:flex-row">
                <div class="flex-grow space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Név</label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            value="{{ old('name', auth()->user()->name) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        >

                            <div class="mt-2 text-sm text-red-500">
                                {{ $errors->first('name') }}
                            </div>

                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">E-mail cím</label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            value="{{ old('email', auth()->user()->email) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        >

                            <div class="mt-2 text-sm text-red-500">
                                {{ $errors->first('email') }}
                            </div>

                    </div>

                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700">Bemutatkozó szöveg</label>
                        <textarea
                            name="content"
                            id="content"
                            value="{{ old('content', auth()->user()->content) }}"
                            rows="10"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        ></textarea>

                            <div class="mt-2 text-sm text-red-500">
                                {{ $errors->first('content') }}
                            </div>

                    </div>
                </div>

                <div class="mt-6 flex-grow lg:mt-0 lg:ml-6 lg:flex-shrink-0 lg:flex-grow-0">
                    <p class="text-sm font-medium text-gray-700" aria-hidden="true">Profilkép</p>
                    <div class="mt-1 lg:hidden">
                        <div class="flex items-center">
                            <div class="inline-block h-12 w-12 flex-shrink-0 overflow-hidden rounded-full" aria-hidden="true">
                                <img class="h-full w-full rounded-full" src="{{ auth()->user()->getProfilePicture() }}" alt="">
                            </div>
                            <div class="ml-5 rounded-md shadow-sm">
                                <a href="/admin/profile/picture" class="group relative flex items-center justify-center rounded-md border border-gray-300 py-2 px-3 focus-within:ring-2 focus-within:ring-sky-500 focus-within:ring-offset-2 hover:bg-gray-50">
                                    <label for="mobile-user-photo" class="pointer-events-none relative text-sm font-medium leading-4 text-gray-700">
                                        <span>Csere</span>
                                    </label>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="relative hidden overflow-hidden rounded-full lg:block">
                        <img class="relative h-40 w-40 rounded-full" src="{{ auth()->user()->getProfilePicture() }}" alt="">
                        <a href="/admin/profile/picture" class="absolute rounded-full inset-0 flex h-full w-full items-center justify-center bg-black bg-opacity-75 text-sm font-medium text-white opacity-0 focus-within:opacity-100 hover:opacity-100">
                            <span>Csere</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="flex justify-end mt-12">
                <a href="/password" class="mr-3 rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-0">Jelszó csere</a>
                <a href="/dashboard" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-0">Mégsem</a>
                <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-0">Mentés</button>
            </div>
        </form>
    </div>
</div>
</x-admin-layout>
