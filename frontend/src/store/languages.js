import http from '../http';

export default {
    state: {
        languages: [],
        currentLangCode: localStorage.getItem('lng'),
    },
    actions: {
        loadLanguages({commit}) {
            http
                .get(`/language`)
                .then(({data}) => {
                    commit('SET_LANGUAGES', data);
                });
        },
        chooseLang({commit, getters}, language) {
            if (getters.currentLang.code !== language.code) {
                commit('CHOOSE_LANG', language);
            }
        }
    },
    getters: {
        getLanguages(state) {
            return state.languages;
        },
        currentLang(state) {
            const code = state.currentLangCode;

            if (null === code) {
                return state.languages[0];
            }

            return state.languages.find(language => language.code === code);
        }
    },
    mutations: {
        CHOOSE_LANG: (state, language) => {
            state.currentLangCode = language.code;
            localStorage.setItem('lng', language.code);
            location.reload();
        },
        SET_LANGUAGES(state, data) {
            state.languages = data.data;
        },
    },
}
