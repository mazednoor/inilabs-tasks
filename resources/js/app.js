import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler';
import Todo from './components/Todo.vue';

const app = createApp({
    components: {
        Todo,
    }
});

app.mount('#app');
