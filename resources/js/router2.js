window.Vue = require('vue');
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import Home from './components/frontend/layouts/home'

const router2=new VueRouter({
    mode:'history',
    routes:[
        
        { path: '/',
        name:Home,
        component:Home },

    ]
});

export default router2;