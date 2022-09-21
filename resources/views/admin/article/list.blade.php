<x-admin-layout>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">Hírek</h1>
                <p class="mt-2 text-sm text-gray-700">Itt tudja megtekinteni a híreket, új hírt létrehozni szerkeszteni és törölni a meglévőket.</p>
            </div>

            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <a
                    href="#"
                    type="button"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
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
                        <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-medium uppercase text-gray-700 lg:table-cell">Közzététel dátuma</th>
                        <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-medium uppercase text-gray-700 sm:table-cell">Megjelenés vége</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-medium uppercase text-gray-700">Szerző</th>
                        <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-medium uppercase text-gray-700 md:table-cell">Látható?</th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6"></th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse ($articles as $article)
                        <tr>
                            <td class="w-full max-w-0 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none sm:pl-6">
                                {{ $article->title }}
                            <dl class="font-normal lg:hidden">
                                <dd class="mt-1 truncate text-gray-700">
                                    <i>{{ $article->published_at->translatedFormat('Y. F j. H:i') }}</i>
                                </dd>
                                <dd class="mt-1 truncate text-gray-500 sm:hidden">
                                    <i>{{ $article->expires_at->translatedFormat('Y. F j. H:i') }}</i>
                                </dd>
                            </dl>
                            </td>
                            <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">
                                <i>{{ $article->published_at->translatedFormat('Y. F j. H:i') }}</i>
                            </td>
                            <td class="hidden px-3 py-4 text-sm text-gray-500 sm:table-cell">
                                <i>{{ $article->expires_at->translatedFormat('Y. F j. H:i') }}</i>
                            </td>
                            <td class="px-3 py-4 text-sm text-gray-500">
                                {{ optional($article->user)->name }}
                            </td>
                            <td class="hidden px-3 py-4 text-sm text-gray-500 md:table-cell">
                                Látható?
                            </td>
                            <td class="py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                <a href="#" class="inline-flex items-center justify-center rounded-md bg-gray-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-none sm:w-auto">
                                    Előnézet
                                </a>
                                <a href="#" class="inline-flex items-center justify-center rounded-md bg-green-600 px-4 py-2 mx-4 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-none sm:w-auto">
                                    Szerkesztés
                                </a>
                                <a href="#" class="inline-flex items-center justify-center rounded-md bg-red-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-none sm:w-auto">
                                    Törlés
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">Nincs megjeleníthető hír</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
