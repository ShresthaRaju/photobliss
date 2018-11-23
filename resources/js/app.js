/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");
require("../../node_modules/material-kit/assets/js/core/bootstrap-material-design.min.js");
require("../../node_modules/material-kit/assets/js/material-kit.min.js");

window.Vue = require("vue");

// vue toasted
import Toasted from "vue-toasted";
Vue.use(Toasted);

//vue google maps
import * as VueGoogleMaps from "vue2-google-maps";
Vue.use(VueGoogleMaps, {
    load: {
        key: "AIzaSyBhztCK9gFVGR9tIHxbRgRC3ui8miMZ13M",
        libraries: "places"
    }
});

// vuex central store
import { centralStore } from "./vuex/centralStore";

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component("sign-in", require("./components/auth/SignIn.vue"));
Vue.component("sign-up", require("./components/auth/SignUp.vue"));
Vue.component("submit-photo", require("./components/photo/SubmitPhoto.vue"));
Vue.component("user-profile", require("./components/user/Profile.vue"));

const app = new Vue({
    store: centralStore,
    el: "#app"
});
