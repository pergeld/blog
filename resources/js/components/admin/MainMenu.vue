<template>
    <nav class="space-y-1 px-2">
        <a v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-indigo-800 text-white' : 'text-indigo-100 hover:bg-indigo-600', 'group flex items-center px-2 py-2 text-base font-medium rounded-md']">
            <component :is="item.icon" class="mr-4 h-6 w-6 flex-shrink-0 text-indigo-300" aria-hidden="true" />
            {{ item.name }}
        </a>
    </nav>
</template>

<script setup>
    import {
        CalendarIcon,
        ChartBarIcon,
        FolderIcon,
        HomeIcon,
        InboxIcon,
        NewspaperIcon,
    } from '@heroicons/vue/24/outline'
    const navigation = [
        { name: 'Dashboard', href: '#', icon: HomeIcon, current: props.currentRouteName.includes('dashboard') ? true : false },
        { name: 'Hírek', href: '/admin/articles/list', icon: NewspaperIcon, current: props.currentRouteName.includes('admin/articles/') ? true : false },
        { name: 'Projects', href: '#', icon: FolderIcon, current: false },
        { name: 'Calendar', href: '#', icon: CalendarIcon, current: false },
        { name: 'Documents', href: '#', icon: InboxIcon, current: false },
        { name: 'Reports', href: '#', icon: ChartBarIcon, current: false },
    ]
    const props = defineProps(['currentRouteName'])
</script>
