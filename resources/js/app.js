import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler.js';
import RoomsComponent from './components/RoomsComponent.vue';
import MessageComponent from './components/MessageComponent.vue';

const app = createApp({});
app.component('rooms-component', RoomsComponent);
app.component('message-component', MessageComponent);
app.mount('#app');
