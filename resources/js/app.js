
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('../../node_modules/material-kit/assets/js/core/bootstrap-material-design.min.js');
require('../../node_modules/material-kit/assets/js/material-kit.min.js');

window.Vue = require('vue');

// vue toasted
import Toasted from 'vue-toasted';
Vue.use(Toasted);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('sign-in', require('./components/auth/SignIn.vue'));
Vue.component('sign-up', require('./components/auth/SignUp.vue'));
Vue.component('submit-photo', require('./components/photo/SubmitPhoto.vue'));
Vue.component('display-photo', require('./components/photo/DisplayPhoto.vue'));

const app = new Vue({
    el: '#app'
});
