require('./bootstrap');

window.Vue = require('vue');


Vue.component('header-component', require('./components/partials/HeaderComponent.vue').default);
Vue.component('main-component', require('./components/main/MainComponent.vue').default);


const app = new Vue({
    el: '#app',
});
