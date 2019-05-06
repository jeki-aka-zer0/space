import axios from 'axios';

axios.defaults.baseURL = process.env.VUE_APP_API_URL;

const axiosInstance = axios.create({
    baseURL: process.env.VUE_APP_API_URL,
    headers: (() => {
        const headers = {Accept: 'application/json'};
        const language = localStorage.getItem('lng');

        if (null !== language) {
            headers['Accept-Language'] = language;
        }

        return headers;
    })(),
});

export default axiosInstance;