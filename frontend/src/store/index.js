import Vue from 'vue'
import Vuex from 'vuex'

import languages from './languages';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        languages
    },
});
