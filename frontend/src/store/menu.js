import http from '../http';

export default {
    state: {
        menu: {
            isLoaded: false,
            data: [],
        },
    },
    actions: {
        loadMenu({commit}) {
            http
                .get(`/menu`)
                .then(({data}) => {
                    commit('SET_MENU', data);
                });
        },
    },
    getters: {
        getMenu(state) {
            return state.menu;
        },
    },
    mutations: {
        SET_MENU(state, data) {
            state.menu.isLoaded = true;
            state.menu.data = data;
        },
    },
}
