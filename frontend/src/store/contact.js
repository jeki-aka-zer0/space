import http from '../http';

export default {
    actions: {
        contact({commit}, data) {
            return new Promise((resolve, reject) => {
                http
                    .post(`/support/contact`, data)
                    .then(() => {
                        resolve();
                    })
                    .catch(error => {
                        reject(error);
                    });
            });
        },
    },
}
