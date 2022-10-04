<x-admin-layout>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">Hír kategóriák</h1>
                <p class="mt-2 text-sm text-gray-700">Itt tudja megtekinteni a hír kategóriákat, új kategóriát létrehozni szerkeszteni és törölni a meglévőket.</p>
            </div>

            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <a
                    href="/admin/articleCategories/create"
                    type="button"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-0 sm:w-auto"
                >
                    Új hír
                </a>
            </div>
        </div>

        <div class="-mx-4 mt-8 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-medium uppercase text-gray-700 sm:pl-6">Megnevezés</th>
                        <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-medium uppercase text-gray-700 md:table-cell">Látható?</th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6"></th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse ($articleCategories as $articleCategory)
                        <tr>
                            <td class="w-full max-w-0 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none sm:pl-6">
                                {{ $articleCategory->title }}
                            </td>
                            <td class="hidden px-3 py-4 text-sm text-gray-500 md:table-cell">
                                @if ($articleCategory->is_visible)
                                    <div class="flex text-green-500">
                                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Látható
                                    </div>
                                @else
                                    <div class="flex text-red-500">
                                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Nem látható
                                    </div>
                                @endif
                            </td>
                            <td class="flex flex-col 2xl:flex-row justify-end items-end py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                <a href="/admin/articleCategories/{{ $articleCategory->id }}/edit" class="inline-flex items-center justify-center rounded-md bg-green-600 px-4 py-2 my-4 2xl:my-0 mx-0 2xl:mx-4 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-none sm:w-auto">
                                    Szerkesztés
                                </a>
                                <form action="/admin/articleCategories/{{ $articleCategory->id }}" method="POST" class="inline-flex items-center justify-center">
                                    @csrf
                                    @method('DELETE')
                                    <button class="inline-flex items-center justify-center rounded-md bg-red-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-none sm:w-auto">
                                        Törlés
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4">Nincs megjeleníthető kategória</td>
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
