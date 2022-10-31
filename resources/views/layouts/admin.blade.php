<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin layout</title>
    <meta name="csrf_token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
</head>
<body class="h-full">
    <div id="app">
        <dashboard-sidebar
            current-route-name="{{ Request::path() }}"
            dashboard-route-name="{{ route('admin.dashboard') }}"
        ></dashboard-sidebar>

        <!-- Static sidebar for desktop -->
        <div class="hidden lg:fixed lg:inset-y-0 lg:flex lg:w-64 lg:flex-col">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex flex-grow flex-col overflow-y-auto bg-gray-900 pt-5">
                <div class="flex flex-shrink-0 items-center px-4">
                    <a href="{{ route('admin.dashboard') }}" class="flex flex-shrink-0 items-center">
                        <img class="h-8 w-auto" src="{{ asset('images/admin-logo.png') }}" alt="Your Company">
                        <div class="text-gray-100 text-md pl-3">Leaf admin</div>
                    </a>
                </div>
                <div class="mt-5 flex flex-1 flex-col">
                    <main-menu
                        current-route-name="{{ Request::path() }}"
                    ></main-menu>
                </div>
            </div>
        </div>

        <div class="flex flex-1 flex-col lg:pl-64">
            <div class="sticky top-0 z-10 flex h-16 flex-shrink-0 bg-white shadow">
                <div class="flex flex-1 justify-between px-4">

                    <div class="flex items-center">
                        <a
                        href="{{ route('home') }}"
                        target="_blank"
                        class="hidden lg:inline-flex items-center justify-center rounded-md border border-transparent bg-gray-900 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-0 sm:w-auto"
                    >
                        Oldal megtekintése
                    </a>
                    </div>

                    <div class="ml-4 flex items-center lg:ml-6">
                        <button type="button" class="rounded-full bg-white p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-0">
                            <!-- Heroicon name: outline/bell -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                            </svg>
                        </button>

                        <!-- Profile dropdown -->
                        <dashboard-dropdown
                            auth-user-profile-picture="{{ asset(auth()->user()->getProfilePicture()) }}"
                        ></dashboard-dropdown>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf

                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                                class="rounded-full bg-white p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-0"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                </svg>
                            </a>
                        </form>
                    </div>
                </div>
            </div>

            <main>
                <div class="p-6">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    @vite('resources/js/app.js')
</body>
</html>
