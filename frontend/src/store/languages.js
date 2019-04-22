export default {
    actions: {
        chooseLang({commit}, language) {
            commit('CHOOSE_LANG', language);
        }
    },
    getters: {
        additionalLanguages(state, getters) {
            return state.languages.filter(language => {
                return language.code !== getters.currentLang.code;
            });
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
            state.currentLang = language;
            state.currentLangCode = language.code;
            localStorage.setItem('lng', language.code);
        }
    },
    state: {
        languages: [
            {
                id: 1,
                label: 'Русский',
                labelShort: 'Ру',
                code: 'ru',
            },
            {
                id: 2,
                label: 'English',
                labelShort: 'En',
                code: 'en',
            },
        ],
        currentLang: null,
        currentLangCode: localStorage.getItem('lng'),
    },
}
