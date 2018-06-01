/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

// font awesome imports
import fontawesome from "@fortawesome/fontawesome";
import faPlay from "@fortawesome/fontawesome-free-solid/faPlay";
import faVolumeUp from "@fortawesome/fontawesome-free-solid/faVolumeUp";
import faPause from "@fortawesome/fontawesome-free-solid/faPause";
import regular from "@fortawesome/fontawesome-pro-regular";
import faLink from "@fortawesome/fontawesome-pro-light/faLink";
import faShareAlt from "@fortawesome/fontawesome-free-solid/faShareAlt";
import faFacebook from "@fortawesome/fontawesome-free-brands/faFacebookF";
import faYouTube from "@fortawesome/fontawesome-free-brands/faYouTube";
import faTwitter from "@fortawesome/fontawesome-free-brands/faTwitter";
import faInstagram from "@fortawesome/fontawesome-free-brands/faInstagram";

fontawesome.config = {
	searchPseudoElements: true
};

fontawesome.library.add(
	faPlay,
	regular,
	faLink,
	faVolumeUp,
	faPause,
	faShareAlt,
	faFacebook,
	faYouTube,
	faTwitter,
	faInstagram
);

// window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });
