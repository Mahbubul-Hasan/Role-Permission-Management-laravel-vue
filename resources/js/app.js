require("./bootstrap");

window.Vue = require("vue").default;

import router from "./routes/router";

const app = new Vue({
    el: "#app",
    router
});
