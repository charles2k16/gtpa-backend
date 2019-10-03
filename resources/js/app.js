require('./bootstrap');

window.Vue = require('vue');


// Vue.component(
//   'passport-clients',
//   require('./components/passport/Clients.vue')
// );

// Vue.component(
//   'passport-authorized-clients',
//   require('./components/passport/AuthorizedClients.vue')
// );

// Vue.component(
//   'passport-personal-access-tokens',
//   require('./components/passport/PersonalAccessTokens.vue')
// );

Vue.component('main-container', require('./containers/MainContainer.vue').default);

const app = new Vue({
  el: '#app',
});
