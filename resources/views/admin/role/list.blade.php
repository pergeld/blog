<x-admin-layout>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">Szerepkörök</h1>
                <p class="mt-2 text-sm text-gray-700">Itt tudja megtekinteni az egyes szerepköröket, új szerepkört létrehozni és módosítani a meglévőket.</p>
            </div>

            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                @can('Szerepkör létrehozás')
                    <a
                        href="/admin/roles/create"
                        type="button"
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-0 sm:w-auto"
                    >
                        Új szerepkör
                    </a>
                @endcan
            </div>
        </div>

        <div class="-mx-4 mt-8 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="py-2.5 pl-4 pr-3 text-left text-sm font-medium uppercase text-gray-700 sm:pl-6">#</th>
                        <th scope="col" class="px-2 py-3.5 text-left text-sm font-medium uppercase text-gray-700">Megnevezés</th>
                        <th scope="col" class="relative py-2.5 pl-3 pr-4 sm:pr-6"></th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse ($roles as $role)
                        <tr>
                            <td class="w-full max-w-0 py-4 pl-4 pr-2 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none sm:pl-6">
                                {{ $role->id }}
                            </td>
                            <td class="px-2 py-4 text-sm text-gray-500">
                                {{ $role->name }}
                            </td>
                            <td class="flex flex-col 2xl:flex-row justify-end items-end py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                @can('Szerepkör szerkesztés')
                                    <a href="/admin/roles/{{ $role->id }}/edit" class="inline-flex items-center justify-center rounded-md bg-green-600 px-4 py-2 my-4 2xl:my-0 mx-0 2xl:mx-4 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-none sm:w-auto">
                                        Szerkesztés
                                    </a>
                                @endcan
                                @can('Szerepkör törlés')
                                    <form action="/admin/roles/{{ $role->id }}" method="POST" class="inline-flex items-center justify-center">
                                        @csrf
                                        @method('DELETE')
                                        <button class="inline-flex items-center justify-center rounded-md bg-red-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-none sm:w-auto">
                                            Törlés
                                        </button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4">Nincs megjeleníthető szerepkör</td>
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
