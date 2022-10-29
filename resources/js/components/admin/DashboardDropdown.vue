<template>
    <Menu as="div" class="relative ml-3 mr-3">
        <div>
            <MenuButton class="flex max-w-xs items-center rounded-full bg-white text-sm focus:outline-none focus:ring-0">
                <span class="sr-only">Open user menu</span>
                <img class="h-8 w-8 rounded-full" :src="this.authUserProfilePicture" alt="" />
            </MenuButton>
        </div>
        <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
            <MenuItems class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                <MenuItem v-for="item in userNavigation" :key="item.name" v-slot="{ active }">
                    <a :href="item.href" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">{{ item.name }}</a>
                </MenuItem>
            </MenuItems>
        </transition>
    </Menu>
</template>

<script setup>
    import {
        Menu,
        MenuButton,
        MenuItem,
        MenuItems,
    } from '@headlessui/vue'
    const props = defineProps(['logoutAction', 'authUserProfilePicture'])
    const userNavigation = [
        { name: 'Profil', href: '/profile' },
        { name: 'Beállítások', href: '#' },
    ]
</script>
