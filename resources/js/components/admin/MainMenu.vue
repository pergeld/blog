<template>
    <nav class="space-y-1 px-2">
        <a v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-gray-700 text-white' : 'text-gray-100 hover:bg-gray-800', 'group flex items-center px-2 py-2 text-base font-medium rounded-md']">
            <component :is="item.icon" class="mr-4 h-6 w-6 flex-shrink-0 text-gray-100" aria-hidden="true" />
            {{ item.name }}
        </a>
    </nav>
</template>

<script setup>
    import {
        TagIcon,
        UsersIcon,
        FolderIcon,
        HomeIcon,
        DocumentTextIcon,
        NewspaperIcon,
        KeyIcon,
    } from '@heroicons/vue/24/outline'
    const navigation = [
        { name: 'Dashboard', href: '#', icon: HomeIcon, current: props.currentRouteName.includes('dashboard') ? true : false },
        { name: 'Hírek', href: '/admin/articles/list', icon: NewspaperIcon, current: props.currentRouteName.includes('admin/articles/') ? true : false },
        { name: 'Hír kategóriák', href: '/admin/articleCategories/list', icon: FolderIcon, current: props.currentRouteName.includes('admin/articleCategories/') ? true : false },
        { name: 'Címkék', href: '/admin/tags/list', icon: TagIcon, current: props.currentRouteName.includes('admin/tags/') ? true : false },
        { name: 'Tartalomkezelő', href: '/admin/pageContents/list', icon: DocumentTextIcon, current: props.currentRouteName.includes('admin/pageContents/') ? true : false },
        { name: 'Felhasználók', href: '/admin/users/list', icon: UsersIcon, current: props.currentRouteName.includes('admin/users/') ? true : false },
        { name: 'Szerepkörök', href: '/admin/roles/list', icon: KeyIcon, current: props.currentRouteName.includes('admin/roles/') ? true : false },
    ]
    const props = defineProps(['currentRouteName'])
</script>
