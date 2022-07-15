
// import Vue from 'vue';
// import axios from 'axios';
export default {
    install(Vue) {
        Vue.prototype.$getSafe = function (fn) {
            try {
                return fn();
            } catch (e) {
                return ""
            }
        };
    }
}