import axios from 'axios';

axios.defaults.baseURL = process.env.VUE_APP_API_URL;

const axiosInstance = axios.create({
    baseURL: process.env.VUE_APP_API_URL,
    headers: {
        Accept: 'application/json',
        'Accept-Language': localStorage.getItem('lng'),
    },
});

export default axiosInstance;