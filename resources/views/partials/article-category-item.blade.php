<a href="{{ $articleCategory->getLink() }}" class="rounded-2xl border border-gray-200 p-8 hover:border-gray-500 duration-300">
    <img
                src="{{ $articleCategory->getCoverPicture() }}"
                alt="{{ $articleCategory->title }}"
                class="h-8 w-8">

    <h3 class="mt-6 font-semibold text-gray-900">
        {{ $articleCategory->title }}
    </h3>

    <p class="mt-2 text-gray-700">
        Step-by-step guides to setting up your system and installing the library.
    </p>
</a>
