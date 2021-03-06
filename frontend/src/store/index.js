import Vue from 'vue'
import Vuex from 'vuex'

import contact from './contact';
import jobs from './jobs';
import languages from './languages';
import menu from './menu';
import modal from './modal';
import projects from './projects';
import texts from './texts';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        contact,
        jobs,
        languages,
        menu,
        modal,
        projects,
        texts
    },
});
