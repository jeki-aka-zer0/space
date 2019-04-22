import axios from 'axios'

export default {
    actions: {
        login({commit}, data) {
            return new Promise((resolve, reject) => {
                axios.post('https://reqres.in/api/login', {
                    email: data.email,
                    password: data.password
                })
                    .then(({data}) => {
                        commit('LOGIN', data.token);
                        resolve();
                    })
                    .catch(error => {
                        commit('LOGOUT');
                        reject(error);
                    });
            });
        },
        logout({commit}) {
            return new Promise((resolve) => {
                commit('LOGOUT');
                resolve();
            });
        },
    },
    getters: {
        isLoggedIn(state) {
            return !!state.token;
        }
    },
    mutations: {
        LOGIN(state, token) {
            state.token = token;
            localStorage.setItem('token', token);
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
        },
        LOGOUT(state) {
            state.token = null;
            localStorage.removeItem('token');
            delete axios.defaults.headers.common['Authorization'];
        },
    },
    state: {
        currentEmail: null,
        token: localStorage.getItem('token'),
    },
}
