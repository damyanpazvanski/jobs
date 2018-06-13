
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('registration-user-info', require('./components/Auth/UserInfo.vue'));
Vue.component('registration-company-info', require('./components/Auth/CompanyInfo.vue'));
Vue.component('choose-plan', require('./components/Auth/ChoosePlan.vue'));
Vue.component('registration', require('./components/Auth/RegistrationComponent.vue'));

const app = new Vue({
    el: '#app'
});
