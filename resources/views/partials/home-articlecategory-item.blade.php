<a href="#" class="group relative rounded-2xl border border-gray-200 p-8 duration-300 hover:bg-blue-50 hover:border-gray-50">
    <img src="{{ $articleCategory->getCoverPicture() }}" alt="{{ $articleCategory->title }}" class="h-12 w-12">

    <h3 class="mt-6 font-semibold text-base text-gray-900">{{ $articleCategory->title }}</h3>

    <p class="mt-1 text-sm text-gray-700">
        Step-by-step guides to setting up your system and installing the library.
    </p>
</a>
