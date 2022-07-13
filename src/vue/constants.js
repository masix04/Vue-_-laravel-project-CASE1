
// import Vue from 'vue';
import axios from 'axios';

export default {
    // install(Vue, options) {
        install(Vue) {
        Vue.prototype.$axios = axios;

        Vue.prototype.$API_URL = process.env.API_URL;
        Vue.prototype.$storageURL = process.env.STORAGE_URL;
        Vue.prototype.$SITE_SETTINGS = process.env.API_URL + 'api/site-setting';

        Vue.prototype.getAuthHeader = function () {
            var user_data = this.$store.getters.getUser;
            if (!user_data) {
                return {'Accept': 'application/json','Device-Type': 'web', 'Content-Type': 'application/json'};
            }
            return {'Authorization': 'Bearer ' + user_data.accessToken.token,'Device-Type': 'web', 'Accept': 'application/json', 'Content-Type': 'application/json'};
        };

        Vue.prototype.getImageHeader = function () {
            var user_data = this.$store.getters.getUser;
            if (!user_data) {
                return {'Authorization': 'Bearer ' + user_data.accessToken.token, 'Accept': 'application/json'};
            }
        }

    }
};

