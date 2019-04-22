import Vue from 'vue'
import Vuex from 'vuex'

import languages from './languages';
import auth from './auth';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        languages,
        auth
    },
});
