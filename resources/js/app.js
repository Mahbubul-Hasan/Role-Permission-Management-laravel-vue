require("./bootstrap");

window.Vue = require("vue").default;

import router from "./routes/router";
import store from "./vueX/vuex";

const app = new Vue({
    el: "#app",
    router,
    store
});
