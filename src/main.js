import Vue from 'vue';
import App from './App';
import { createRouter } from './router/router.js'

//===================================================================================================
import vue_utils from './vue/vue_utils';
Vue.use(vue_utils);

//=================Assets Loading========================================================
import './assets/css/main.css';

//------------------------
import('./assets/js/utils.js');

export function createApp() {

    const router = createRouter();

    const app = new Vue({
        router,
        render: h => h(App),
        data() {
            return {
            };
        },
        mounted() {},
    });
    global.$root = app;

    return {app, router};
}

// createApp(App).mount('#app')
