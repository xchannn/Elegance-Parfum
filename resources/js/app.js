import '../css/app.css';
import './bootstrap';
import AOS from 'aos';

import { createApp } from 'vue';
import router from './router';
import App from './App.vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createApp(App)
    .use(router)
    .use(ZiggyVue)
    .mount('#app');

AOS.init();
