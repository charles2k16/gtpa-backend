require('./bootstrap');

window.Vue = require('vue');

import router from './router'

Vue.component('main-container', require('./containers/MainContainer.vue').default);

const app = new Vue({
  el: '#app',
  router
});
