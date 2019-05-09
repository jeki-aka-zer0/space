import http from '../http';

export default {
    state: {
        projects: [],
    },
    actions: {
        loadProjects({commit}) {
            http
                .get(`/project`)
                .then(({data}) => {
                    commit('SET_PROJECTS', data);
                });
        },
    },
    getters: {
        getProjects(state) {
            return state.projects;
        },
    },
    mutations: {
        SET_PROJECTS(state, data) {
            state.projects = data;
        },
    },
}
