import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js';

// Admin Layouts
import DashboardDropdown from './components/admin/DashboardDropdown.vue';
import DashboardSidebar from './components/admin/DashboardSidebar.vue';
import MainMenu from './components/admin/MainMenu.vue';
import SuccessNotification from './components/admin/notification/SuccessNotification.vue';

// Admin elements
import ArticleForm from './components/admin/article/ArticleForm.vue';

createApp({
    components: {
        DashboardDropdown,
        DashboardSidebar,
        MainMenu,
        ArticleForm,
        SuccessNotification,
    },
}).mount("#app")
