import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "../components/Home/index.vue";
// Users
import User_List from "../components/User/index.vue";
import Create_User from "../components/User/create.vue";
import Edit_User from "../components/User/edit.vue";

const routes = [
    { path: "/", name: "home", component: Home },
    // Users
    { path: "/users", name: "users", component: User_List },
    { path: "/users/create", name: "users.create", component: Create_User },
    { path: "/users/:id/edit", name: "users.edit", component: Edit_User }
];

const router = new VueRouter({
    routes // short for `routes: routes`
});

export default router;
