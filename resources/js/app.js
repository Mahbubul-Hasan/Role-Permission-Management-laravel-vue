require("./bootstrap");

window.Vue = require("vue").default;

import router from "./routes/router";
import store from "./vuex/vuex";

const app = new Vue({
    el: "#app",
    router,
    store
});
