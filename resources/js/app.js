import '../css/app.css';
import './bootstrap';
import AOS from 'aos';

import { createApp } from 'vue';
import { createPinia } from 'pinia';
import router from './router';
import App from './App.vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

const app = createApp(App);
app.use(createPinia());
app.use(router);
app.use(ZiggyVue);
app.mount('#app');

AOS.init();
