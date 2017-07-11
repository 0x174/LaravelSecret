import Vue from 'vue'
import VueProgressBar from 'vue-progressbar'
import Notifications from 'vue-notification'
import VueClipboards from 'vue-clipboards';
import App from './app.vue'

require('./bootstrap');

window.Vue = Vue

 const options = {
  color: '#bffaf3',
  failedColor: '#ff3860',
  thickness: '5px'
}

Vue.use(VueProgressBar, options)
Vue.use(Notifications)
Vue.use(VueClipboards);

const app = new Vue({
  components: {
    'secret-app': App
  },
  el: '#app'
});
