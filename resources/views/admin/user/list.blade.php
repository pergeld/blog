<x-admin-layout>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">Felhasználók</h1>
                <p class="mt-2 text-sm text-gray-700">Itt tudja megtekinteni a felhasználókat, új felhasználót létrehozni szerkeszteni és törölni a meglévőket.</p>
            </div>

            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                @can('Felhasználó létrehozás')
                    <a
                        href="/admin/users/create"
                        type="button"
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-gray-900 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-0 sm:w-auto"
                    >
                        Új felhasználó
                    </a>
                @endcan
            </div>
        </div>

        <div class="-mx-4 mt-8 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-900">
                    <tr>
                        <th scope="col" class="py-2.5 pl-4 pr-3 text-left text-sm font-medium uppercase text-gray-100 sm:pl-6">Név</th>
                        <th scope="col" class="hidden px-2 py-3.5 text-left text-sm font-medium uppercase text-gray-100 md:table-cell">Szerepkör</th>
                        <th scope="col" class="relative py-2.5 pl-3 pr-4 sm:pr-6"></th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse ($users as $user)
                        <tr>
                            <td class="w-full max-w-0 py-4 pl-4 pr-2 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none sm:pl-6">
                                {{ $user->name }}
                                <dl class="font-normal block md:hidden">
                                    <dd class="mt-1 truncate text-gray-700">
                                        @if (! empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $role)
                                                {{ $role }}
                                            @endforeach
                                        @endif
                                    </dd>
                                </dl>
                            </td>
                            <td class="hidden px-2 py-4 text-sm text-gray-500 md:table-cell">
                                @if (! empty($user->getRoleNames()))
                                    @foreach ($user->getRoleNames() as $role)
                                        {{ $role }}
                                    @endforeach
                                @endif
                            </td>
                            <td class="flex flex-col 2xl:flex-row justify-end items-end py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                @can('Felhasználó módosítás')
                                    <a href="/admin/users/{{ $user->id }}/edit" class="inline-flex items-center justify-center rounded-md bg-green-700 px-4 py-2 my-4 2xl:my-0 mx-0 2xl:mx-4 text-sm font-medium text-white shadow-sm hover:bg-green-900 focus:outline-none focus:ring-none sm:w-auto">
                                        Szerepkör szerkesztése
                                    </a>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4">Nincs megjeleníthető felhasználó</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

    @if (session()->has('successMessage'))
        <success-notification
            title="Sikeres mentés!"
        ></success-notification>
    @endif

    @if (session()->has('deleteMessage'))
        <success-notification
            title="Sikeres törlés!"
        ></succes-notification>
    @endif
</x-admin-layout>
