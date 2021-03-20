/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');

 window.Vue = require('vue');
 
 //vform register here------------------------------------------------
 import { Form, HasError, AlertError } from 'vform'
 
 window.Form=Form;
 Vue.component(HasError.name, HasError)
 Vue.component(AlertError.name, AlertError)
 
 // router register hete---------------------------
 import router from './router2'
 //deafualt component registration----------------------------
 Vue.component('top-header', require('./components/frontend/partial/header.vue').default);
 Vue.component('footer-down', require('./components/frontend/partial/footer.vue').default);
//  Vue.component('index-comps', require('./components/frontend/layouts/index.vue').default);
 
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
   
 
 const app = new Vue({
     el: '#app2',
     router,
     store,

 });
  