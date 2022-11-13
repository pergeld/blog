<footer class="border-t border-gray-200">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="py-16">
            <div class="flex justify-center w-auto">LOGO</div>

            <nav class="mt-10 text-sm">
                <div class="-my-1 flex justify-center gap-x-6">
                    <a href="#" class="inline-block rounded-lg py-1 px-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                        Kezdőlap
                    </a>
                    <a href="#" class="inline-block rounded-lg py-1 px-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                        Blog
                    </a>
                    <a href="#" class="inline-block rounded-lg py-1 px-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                        Témák
                    </a>
                    <a href="#" class="inline-block rounded-lg py-1 px-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                        Rólunk
                    </a>
                    <a href="#" class="inline-block rounded-lg py-1 px-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                        Csapat
                    </a>
                </div>
            </nav>
        </div>

        <div class="flex items-center sm:justify-start">
            <div class="mt-6 text-sm text-gray-500 sm:mt-0">
                &copy; {{ \Carbon\Carbon::now()->translatedFormat('Y') }} {{ __('Copyright') }} Laravel Lépésről Lépésre Blog
            </div>
        </div>
    </div>
</footer>
