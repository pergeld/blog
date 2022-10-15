<x-admin-layout>
    <div class="px-0 sm:px-6 lg:px-8">
        <div class="sm:flex-auto mb-6">
            <h1 class="text-xl font-semibold text-gray-900">Felhasználó létrehozása</h1>
        </div>

        <user-form
            csrf="{{ csrf_token() }}"
            back-link="/admin/users/list"
            submit-url="/register"
        ></user-form>
    </div>
</x-admin-layout>
