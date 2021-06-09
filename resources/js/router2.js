window.Vue = require('vue');
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import Home from './components/frontend/layouts/home';
import singleProduct from './components/frontend/product/singleProduct'
import Shop from './components/frontend/product/shop'
import Login from './components/frontend/auth/login'
import Account from './components/frontend/customerAccount/myAccount.vue'
import Cart from './components/frontend/cart/cart.vue'
import Wishlist from './components/frontend/wishlist/wishlist.vue'
import Checkout from './components/frontend/checkout/checkout.vue'
import ErrorPage from './components/frontend/404/error.vue'

const router2=new VueRouter({
    // mode:'history',
    scrollBehavior(){
   return {
    x:0,
    y:0
   }
    },
    routes:[
        
        ///index page -----------------
        { path: '/',
        name:Home,
        component:Home },
        ///single product view route--------------------
        { path:'/single-product/:product_id',
        component:singleProduct},
        ///shop view of product----------------------
        {path:'/shop',
        component:Shop},
        ///login routes here--------------------
        {path:'/login',
        component:Login,
        meta:{
            requiresVisitor:true
        }
    },
       
        {path:'/my-account',
        component:Account,
        meta:{ requiresAuth:true }
    },

        ///customer cart--------------------
        {path:'/cart',
        component:Cart,
        meta: { requiresAuth: true }
    },
        ///customer wishlist--------------------
        {path:'/wishlist',
        component:Wishlist,
        meta: { requiresAuth: true }
    },
    ///customer order checkout--------------------
        {path:'/checkout',
        component:Checkout,
        meta: { requiresAuth: true }
     },
        ////route for any wrong url-----------
        {
         path:'*',
            component:ErrorPage
        }
    ]
});

export default router2;