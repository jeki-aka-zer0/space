import Vue from 'vue'
import Vuex from 'vuex'

import languages from './languages';
import texts from './texts';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        languages,
        texts
    },
});
