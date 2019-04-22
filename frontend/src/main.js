import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import axios from 'axios'

Vue.config.productionTip = false;

axios.defaults.baseURL = process.env.VUE_APP_API_URL;

const token = localStorage.getItem('token');
if (token) {
  axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
}

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app');
