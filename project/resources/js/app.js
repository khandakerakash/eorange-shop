
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('pagination', require('./components/core_component/paginate/LaravelVuePagination'));

Vue.component('front-search', require('./components/front/search/index.vue'));
Vue.component('front-spc', require('./components/front/partials/spc/index.vue'));
Vue.mixin({
    methods: {
        route: route
    }
});
import VueRouter from 'vue-router';

import { routes } from './routes';
Vue.use(VueRouter);
var base_uri;
if ( process.env.NODE_ENV == 'production' ) {
     base_uri = '';
} else {
     base_uri = 'dev/eorangeshop';

}
const router = new VueRouter({
    base: base_uri,
    mode: 'history',
    routes
});
const app = new Vue({
    el: '#app',
    router
});
