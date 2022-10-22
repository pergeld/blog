<x-admin-layout>
    <div class="px-0 sm:px-6 lg:px-8">
        <div class="sm:flex-auto mb-6">
            <h1 class="text-xl font-semibold text-gray-900">Profilkép csere</h1>
        </div>

        <profile-picture
            csrf="{{ csrf_token() }}"
            back-link="/profile"
            :user='@json(new \App\Http\Resources\UserResource(auth()->user()))'
            submit-url="/admin/profile/picture/change"
        ></profile-picture>
    </div>
</x-admin-layout>
