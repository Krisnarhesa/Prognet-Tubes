import './style.css';
import 'flowbite';
import App from './App.vue'
import { createApp,h } from 'vue'
import router from './router';

const app  = createApp({
    render: ()=>h(App)
});

app.use(router)

app.mount('#app')
