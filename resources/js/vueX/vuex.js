import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        users: []
    },

    getters: {
        users(state) {
            return state.users;
        }
    },

    actions: {
        users(context) {
            axios.get("/api/users").then(({ data }) => {
                context.commit("users", data.users);
            });
        }
    },

    mutations: {
        users(state, data) {
            return (state.users = data);
        }
    }
});

export default store;
