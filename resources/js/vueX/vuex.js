import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        permissions: [],
        roles: [],
        users: []
    },

    getters: {
        permissions(state) {
            return state.permissions;
        },
        roles(state) {
            return state.roles;
        },
        users(state) {
            return state.users;
        }
    },

    actions: {
        permissions(context) {
            axios.get("/api/roles/create").then(({ data }) => {
                context.commit("permissions", data.permissions);
            });
        },
        roles(context) {
            axios.get("/api/roles").then(({ data }) => {
                context.commit("roles", data.roles);
            });
        },
        users(context) {
            axios.get("/api/users").then(({ data }) => {
                context.commit("users", data.users);
            });
        }
    },

    mutations: {
        permissions(state, data) {
            return (state.permissions = data);
        },
        roles(state, data) {
            return (state.roles = data);
        },
        users(state, data) {
            return (state.users = data);
        }
    }
});

export default store;
