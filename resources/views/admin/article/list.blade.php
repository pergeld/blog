<x-admin-layout>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">Hírek</h1>
                <p class="mt-2 text-sm text-gray-700">Itt tudja megtekinteni a híreket, új hírt létrehozni szerkeszteni és törölni a meglévőket.</p>
            </div>

            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                @can('Hír létrehozás')
                    <a
                        href="/admin/articles/create"
                        type="button"
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-gray-900 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-0 sm:w-auto"
                    >
                        Új hír
                    </a>
                @endcan
            </div>
        </div>

        <div class="-mx-4 mt-8 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-900">
                    <tr class="border-l-4 border-gray-900">
                        <th scope="col" class="py-2.5 pl-4 pr-3 text-left text-sm font-medium uppercase text-gray-100 sm:pl-6">Megnevezés</th>
                        <th scope="col" class="hidden px-2 py-3.5 text-left text-sm font-medium uppercase text-gray-100 xl:table-cell">Kategória</th>
                        <th scope="col" class="hidden px-2 py-3.5 text-left text-sm font-medium uppercase text-gray-100 xl:table-cell">Közzététel dátuma</th>
                        <th scope="col" class="hidden px-2 py-3.5 text-left text-sm font-medium uppercase text-gray-100 xl:table-cell">Megjelenés vége</th>
                        <th scope="col" class="hidden px-2 py-3.5 text-left text-sm font-medium uppercase text-gray-100 sm:table-cell">Szerző</th>
                        <th scope="col" class="hidden px-2 py-3.5 text-left text-sm font-medium uppercase text-gray-100 md:table-cell">Látható?</th>
                        <th scope="col" class="relative py-2.5 pl-3 pr-4 sm:pr-6"></th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse ($articles as $article)
                        <tr>
                            <td class="w-full max-w-0 py-4 pl-4 pr-2 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none sm:pl-6
                                border-l-4 @if($article->isPublished()) border-green-400 @else border-red-700 @endif
                            ">
                                {{ $article->title }}
                            <dl class="font-normal hidden sm:block xl:hidden">
                                <dd class="mt-1 truncate text-gray-700">
                                    <i>{{ $article->published_at->translatedFormat('Y. F j. H:i') }}</i>
                                </dd>
                                <dd class="mt-1 truncate text-gray-500">
                                    <i>{{ $article->expires_at->translatedFormat('Y. F j. H:i') }}</i>
                                </dd>
                            </dl>
                            </td>
                            <td class="hidden px-2 py-4 text-sm text-gray-500 xl:table-cell">
                                {{ optional($article->articleCategory)->title }}
                            </td>
                            <td class="hidden px-2 py-4 text-sm text-gray-500 xl:table-cell">
                                <i>{{ $article->published_at->translatedFormat('Y. F j. H:i') }}</i>
                            </td>
                            <td class="hidden px-2 py-4 text-sm text-gray-500 xl:table-cell">
                                <i>{{ $article->expires_at->translatedFormat('Y. F j. H:i') }}</i>
                            </td>
                            <td class="hidden px-2 py-4 text-sm text-gray-500 sm:table-cell">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 flex-shrink-0">
                                        <img class="h-8 w-8 rounded-full" src="{{ asset($article->user->getProfilePicture()) }}" alt="{{ optional($article->user)->name }}">
                                    </div>
                                    <div class="pl-2">{{ optional($article->user)->name }}</div>
                                </div>
                            </td>
                            <td class="hidden px-2 py-4 text-sm text-gray-500 md:table-cell">
                                @if ($article->is_visible)
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
                                <a href="#" class="inline-flex items-center justify-center rounded-md bg-gray-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-none sm:w-auto">
                                    Előnézet
                                </a>

                                @can('Hír szerkesztés')
                                    <a href="/admin/articles/{{ $article->id }}/edit" class="inline-flex items-center justify-center rounded-md bg-green-700 px-4 py-2 my-4 2xl:my-0 mx-0 2xl:mx-4 text-sm font-medium text-white shadow-sm hover:bg-green-900 focus:outline-none focus:ring-none sm:w-auto">
                                        Szerkesztés
                                    </a>
                                @endcan

                                @can('Hír törlés')
                                    <form action="/admin/articles/{{ $article->id }}" method="POST" class="inline-flex items-center justify-center">
                                        @csrf
                                        @method('DELETE')
                                        <button class="inline-flex items-center justify-center rounded-md bg-red-700 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-900 focus:outline-none focus:ring-none sm:w-auto">
                                            Törlés
                                        </button>
                                    </form>
                                @endcan

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
