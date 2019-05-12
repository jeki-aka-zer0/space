import http from '../http';

export default {
    actions: {
        contact({commit}, data) {
            return new Promise((resolve, reject) => {
                http
                    .post(
                        `/support/contact`,
                        data,
                        {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            },
                        },
                    )
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
