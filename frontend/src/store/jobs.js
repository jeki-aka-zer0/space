import http from '../http';

export default {
    state: {
        jobs: [],
    },
    actions: {
        loadJobs({commit}) {
            http
                .get(`/job`)
                .then(({data}) => {
                    commit('SET_JOBS', data);
                });
        },
    },
    getters: {
        getJobs(state) {
            return state.jobs;
        },
    },
    mutations: {
        SET_JOBS(state, data) {
            state.jobs = data;
        },
    },
}
