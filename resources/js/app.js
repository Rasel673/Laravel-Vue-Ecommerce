/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

///base url --------------------
var  baseUrl='http://localhost/ecommerce/public/'
Vue.prototype.$baseUrl=baseUrl;


//vform register here------------------------------------------------
import { Form, HasError, AlertError } from 'vform'

window.Form=Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

///pegination-----------------------------------
Vue.component('pagination', require('laravel-vue-pagination'));

// route register hete---------------------------
import router from './router'
Vue.component('dashboard-component', require('./components/pages/dashboard.vue').default);

//vuex register here-----------------------
import store from './store'

///sweet alert here -----------------
import Swal from 'sweetalert2'
window.Swal=Swal;
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

  window.Toast=Toast;
  ///cke editor---------------------
  import CKEditor from '@ckeditor/ckeditor5-vue2';

Vue.use( CKEditor );

const app = new Vue({
    el: '#app',
    router,
    store
});
 