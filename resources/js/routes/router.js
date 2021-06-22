import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "../components/Home/index.vue";
// Rols
import Role_List from "../components/Role/index.vue";
import Create_Role from "../components/Role/create.vue";
import Edit_Role from "../components/Role/edit.vue";
// Users
import User_List from "../components/User/index.vue";
import Create_User from "../components/User/create.vue";
import Edit_User from "../components/User/edit.vue";

const routes = [
    { path: "/", name: "home", component: Home },
    // Rols
    { path: "/roles", name: "roles", component: Role_List },
    { path: "/roles/create", name: "roles.create", component: Create_Role },
    { path: "/roles/:id/edit", name: "roles.edit", component: Edit_Role },
    // Users
    { path: "/users", name: "users", component: User_List },
    { path: "/users/create", name: "users.create", component: Create_User },
    { path: "/users/:id/edit", name: "users.edit", component: Edit_User }
];

const router = new VueRouter({
    mode: "history",
    routes // short for `routes: routes`
});

export default router;
