import './bootstrap';

import { createApp, h } from 'vue';
import { App, plugin } from '@inertiajs/inertia-vue3';
import LogoutButton from './Components/LogoutButton.vue'; 
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import 'alpinejs';

const el = document.getElementById('app');

createApp({
    render: () => h(App, {
        initialPage: JSON.parse(el.dataset.page),
        resolveComponent: name => import(`./Pages/${name}.vue`).then(module => module.default)
    })
})
.use(plugin)
.component('LogoutButton', LogoutButton) 
.mount(el);

