
require('./bootstrap');

window.Vue = require('vue');


Vue.component('navbar', require('./components/Navbar.vue'));
Vue.component('articles', require('./components/Articles.vue'));

const app = new Vue({
  el: '#app'
});
