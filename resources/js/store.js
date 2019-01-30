import { get_local_user } from "./helpers/auth";


const user = get_local_user();

export default {
    state: {
        current_user: user,
        isLoggedIn: !!user,
        pap_codes: [],
        departments: {},
        divisions: {},
        employees: {},
        heads: {},
        users: {},
    },
    getters: {
        isLoading(state) {
            return state.loading;
        },
        isLoggedIn(state) {
            return state.isLoggedIn;
        },
        current_user(state) {
            return state.current_user;
        },
        pap_codes(state){
            return state.pap_codes;
        },
        departments(state){
            return state.departments;
        },
        divisions(state){
            return state.divisions;
        },
        heads(state){
            return state.heads;
        },
        users(state){
            return state.users;
        },

    },
    mutations: {
        login(state) {
            state.loading = true;
            state.auth_error = null;
        },
        loginSuccess(state, payload) {
            state.auth_error = null;
            state.isLoggedIn = true;
            state.loading = false;
            state.current_user = Object.assign({}, payload.user, {token: payload.access_token});

            localStorage.setItem("user", JSON.stringify(state.current_user));
        },
        loginFailed(state, payload) {
            state.loading = false;
            state.auth_error = payload.error;
        },
        logout(state) {
            localStorage.removeItem("user");
            state.isLoggedIn = false;
            state.current_user = null;
        },
        update_pap_codes(state) {
            state.pap_codes = payload;
        },
        update_departments(state) {
            state.departments = payload;
        },
        update_divisions(state) {
            state.divisions = payload;
        },
        update_heads(state) {
            state.heads = payload;
        },
        update_users(state) {
            state.users = payload;
        },
    },
    actions: {
        login(context) {
            context.commit("login");
        },
        get_pap_codes(context){
            axios.get('/api/pap_codes')
            .then((response) => {
                context.commit('update_pap_codes', response.data.pap_codes);
            }).catch(() => {

            });
        },
        get_departments(context){
            axios.get('/api/departments')
            .then((response)=>{
                context.commit('update_departments', response.data.departments)
            }).catch(() => {

            });
        },
        get_divisions(context){
            axios.get('/api/divisions')
            .then((response) => {
                context.commit('update_divisions', response.data.divisions)
            }).catch(() => {

            });
        },
        get_heads(context){
            axios.get('/api/heads')
            .then((response) => {
                context.commit('update_heads', response.data.heads)
            }).catch(() => {

            });
        },
        get_users(context){
            axios.get('/api/users')
            .then((response) => {
                context.commit('update_users', response.data.users)
            }).catch(() => {

            });
        },
    }
};