/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('alpinejs');


window.Vue = require('vue');


Vue.component('moment', require('moment'));

Vue.component('moment-jalaali', require('moment-jalaali'));

Vue.component('moment-jalaali', require('vue-persian-datetime-picker'));

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('DatePicker', require('./components/DatePicker.vue').default);


import VuePersianDatetimePicker from 'vue-persian-datetime-picker';
Vue.use(VuePersianDatetimePicker, {
    name: 'puzzle-date-picker',
    props: {
        inputFormat: 'jYYYY-jMM-jDD',
        format: 'YYYY-MM-DD',
        displayFormat: 'jYYYY-jMM-jDD',
        inputClass: 'form-control rounded w-100',
        altFormat: 'YYYY-MM-DD',
        color: '#f93',
        autoSubmit: true,

    }
});
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    components: {
        DatePicker: VuePersianDatetimePicker
    }
});