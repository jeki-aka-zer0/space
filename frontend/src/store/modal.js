export default {
    state: {
        modal: {
            isVisible: false,
        },
    },
    actions: {
        openModal({commit}, payload) {
            commit('OPEN_MODAL', payload);
        },
        closeModal({commit}) {
            commit('CLOSE_MODAL');
        },
    },
    mutations: {
        OPEN_MODAL(state, {head, id}) {
            state.modal = {
                isVisible: true,
                head,
                id,
            };
        },
        CLOSE_MODAL(state) {
            state.modal = {
                isVisible: false,
                head: '',
                id: '',
            };
        },
    },
    getters: {
        getModal(state) {
            return state.modal;
        },
    },
};
