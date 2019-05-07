import http from '../http';

export default {
    state: {
        texts: {
            isLoaded: false,
            data: [],
        },
    },
    actions: {
        loadTexts({commit}) {
            http
                .get(`/text`)
                .then(({data}) => {
                    commit('SET_TEXTS', data);
                });
        },
    },
    getters: {
        getTexts(state) {
            return state.texts;
        },
        getTextBySlug: (state) => (slug) => {
            return state.texts.data.find(text => text.slug === slug);
        }
    },
    mutations: {
        SET_TEXTS(state, data) {
            state.texts.isLoaded = true;
            state.texts.data = data;
        },
    },
}
