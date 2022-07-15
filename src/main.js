// import Vue from 'vue';
import App from './App';
// import { createRouter } from './router/router.js'
import { createApp } from 'vue'
// import App from './App.vue'
import router from './router/router.js';
//===================================================================================================
// import vue_utils from './vue/vue_utils';
// Vue.use(vue_utils);
// Vue.use(vue_utils);

//=================Assets Loading========================================================
import './assets/css/main.css';

//------------------------
import('./assets/js/utils.js');

const app = createApp(App)

app.use(router)

app.mount('#app')