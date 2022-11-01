import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js';

import './core/index';

// Admin Layouts
import DashboardDropdown from './components/admin/DashboardDropdown.vue';
import DashboardSidebar from './components/admin/DashboardSidebar.vue';
import MainMenu from './components/admin/MainMenu.vue';
import SuccessNotification from './components/admin/notification/SuccessNotification.vue';

// Admin elements
import ArticleForm from './components/admin/article/ArticleForm.vue';
import PageContentForm from './components/admin/pageContent/PageContentForm.vue';
import ProfilePicture from './components/admin/user/ProfilePicture.vue';
import ArticleCategoryForm from './components/admin/articleCategory/ArticleCategoryForm.vue';

createApp({
    components: {
        DashboardDropdown,
        DashboardSidebar,
        MainMenu,
        ArticleForm,
        SuccessNotification,
        PageContentForm,
        ProfilePicture,
        ArticleCategoryForm,
    },
}).mount("#app")
