import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js';
import DashboardDropdown from './components/admin/DashboardDropdown.vue';
import DashboardSidebar from './components/admin/DashboardSidebar.vue';
import MainMenu from './components/admin/MainMenu.vue';

createApp({
    components: {
        DashboardDropdown,
        DashboardSidebar,
        MainMenu,
    },
}).mount("#app")
