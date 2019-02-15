

require('./bootstrap');


import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import { Form, HasError, AlertError } from 'vform';


import {routes} from './routes';
import StoreData from './store';
import {initialize} from './helpers/general';


import appvue from './app.vue';
import moment from 'moment';
import swal from 'sweetalert2'
import VueProgressBar from 'vue-progressbar'




window.swal = swal;

const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });

window.toast = toast;
window.Form = Form;

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.component('pagination', require('laravel-vue-pagination'));

Vue.use(VueRouter);
Vue.use(Vuex);



Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '5px'
})

Vue.filter('upText', function(text){
    return text.charAt(0).toUpperCase() + text.slice(1)
});


Vue.filter('myDate',function(created){
    return moment(created).format('YYYY - MM');
});

window.Fire =  new Vue();

const store = new Vuex.Store(StoreData);
const router = new VueRouter({
    routes,
    mode: 'history'
});

initialize(store, router);

const app = new Vue({
    el: '#app',
    router,
    store,
    components: {
        appvue
    }
});