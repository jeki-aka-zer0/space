export default {
    state: {
        modal: {
            isVisible: false,
        },
    },
    actions: {
        showModal({commit}, payload) {
            commit('OPEN_MODAL', payload);
        },
        closeModal({commit}) {
            commit('CLOSE_MODAL');
        },
    },
    mutations: {
        OPEN_MODAL(state, {head, body, id}) {
            state.modal = {
                isVisible: true,
                head,
                body,
                id,
            };
        },
        CLOSE_MODAL(state) {
            state.modal = {
                isVisible: false,
                head: '',
                body: '',
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
