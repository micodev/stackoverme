require("lightbox2/dist/js/lightbox.js");
require("./bootstrap");
window.Vue = require("vue");
import VueAxios from "vue-axios";

import axios from "axios";

import Clipboard from "v-clipboard";

import Echo from "laravel-echo";

import socketio from "socket.io-client";

import VueSocketIO from "vue-socket.io";

// import Echo from "laravel-echo";

axios.defaults.headers.common = {
    "X-Requested-With": "XMLHttpRequest",
    "X-CSRF-TOKEN": window.csrf_token
};
// export const SocketInstance = socketio("http://localhost:6001");

// Vue.use(
//     new VueSocketIO({
//         debug: true,
//         connection: "http://localhost:6001",
//         query: {
//             token: window.localStorage.getItem("auth")
//         }
//     })
// );
Vue.use(Clipboard);
Vue.use(VueAxios, axios);
window.devicon = require("devicon");

//<link href="alloy-editor/assets/alloy-editor-ocean-min.css" rel="stylesheet">
//<script src="alloy-editor/alloy-editor-all-min.js"></script>
//require('./ckeditor/ckeditor.js');
//require('./ckeditor/styles.js');

// canavs

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context("./", true, /\.vue$/i);
files.keys().map(key =>
    Vue.component(
        key
            .split("/")
            .pop()
            .split(".")[0],
        files(key).default
    )
);

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);
Vue.component(
    "comment-component",
    require("./components/CommentComponent.vue").default
);
// Vue.component(
//     "notfication-component",
//     require("./components/NotifcationComponent.vue").default
// );
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.*/
// window.io = require("socket.io-client");
// window.Echo = new Echo({
//     broadcaster: "socket.io",
//     host: window.location.hostname + ":6001"
// });
new Vue({
    el: "#app"
});
// new Vue({ el: "#notiapp" });

// var iframe = document.getElementsByTagName("iframe"); //this.frameElement;
// console.log(iframe);
// var xiframe = iframe.contentWindow;
// console.log( xiframe.document.getElementsByTagName("body") );
