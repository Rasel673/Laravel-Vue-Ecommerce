window.Vue = require('vue');
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import Home from './components/frontend/layouts/home';
import singleProduct from './components/frontend/product/singleProduct'
const router2=new VueRouter({
    // mode:'history',
    routes:[
        ///index page -----------------
        { path: '/',
        name:Home,
        component:Home },
        ///single product view route--------------------
        { path:'/single-product/:product_id',
        component:singleProduct},
    ]
});

export default router2;