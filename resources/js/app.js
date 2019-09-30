require('./bootstrap');

window.Vue = require('vue');

import router from './router'
import {store} from './store'

Vue.component('main-container', require('./containers/MainContainer.vue').default);

const app = new Vue({
  el: '#app',
  router,
  store
});
