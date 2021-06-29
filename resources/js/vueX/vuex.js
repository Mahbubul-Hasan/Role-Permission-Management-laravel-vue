import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        roles: [],
        users: []
    },

    getters: {
        roles(state) {
            return state.roles;
        },
        users(state) {
            return state.users;
        }
    },

    actions: {
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
        roles(state, data) {
            return (state.roles = data);
        },
        users(state, data) {
            return (state.users = data);
        }
    }
});

export default store;
