window.Vue = require('vue');
import VueRouter from 'vue-router'
Vue.use(VueRouter)



import Dashboard from './components/pages/dashboard'


///category routes-----------------------------
import Category from './components/pages/categories/categoryList'
import AddCategory from './components/pages/categories/addCategory'
import editCategory from './components/pages/categories/editCategory'
///brands routes---------------------
import  Brands from './components/pages/Brands/brandList'
import addBrand from './components/pages/Brands/addBrand'
import editBrand from './components/pages/Brands/editBrand'
//product routes----------------------
import  Produtcs from './components/pages/products/productList'
import addProcuct from './components/pages/products/addProduct'
import editProduct from './components/pages/products/editProduct'
 const router=new VueRouter({
//   mode:'history',
 routes:[
 { path: '/home',  component:Dashboard },
 //category route here---------------   
{ path:'/category',component:Category},
{ path:'/Add-category', component:AddCategory },
{ path:'/edit-category/:slug', component:editCategory },

///brand route-----------------------------------
{ path:'/brands',component:Brands},
{ path:'/Add-brand', component:addBrand },
{ path:'/edit-brand/:slug', component:editBrand },
//product route------------------------------
{ path:'/products',component:Produtcs},
{ path:'/Add-product', component:addProcuct},
{ path:'/edit-product/:slug', component:editProduct },

      ]
     
  })

  export default router;