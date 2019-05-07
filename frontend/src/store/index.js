import Vue from 'vue'
import Vuex from 'vuex'

import languages from './languages';
import modal from './modal';
import texts from './texts';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        languages,
        modal,
        texts
    },
});
