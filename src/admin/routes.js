import { createRouter, createWebHistory } from "vue-router";
import GeneralTab from "./components/tabs/GeneralTab.vue";
import AnotherTab from "./components/tabs/AnotherTab.vue";
import Navigation from "./components/tabs/Navigation.vue";
import Settings from "./components/pages/Settings.vue";
import About from "./components/pages/About.vue";

const basePath = `${cfadminObj.adminUrl}/admin.php?page=cf-vue-kickstart#`;

const routes = [
    { path: '/', name:'Main', components: { default: GeneralTab, tab: Navigation } },
    { path: '/another',name:'Tabs', components: { default: AnotherTab, tab: Navigation } },
    { path: '/settings',name:'Settings', components: { default: Settings } },
    { path: '/about',name:'About', components: { default: About } },
]

const router = createRouter({
    history: createWebHistory(basePath),
    routes,
});

export default router;