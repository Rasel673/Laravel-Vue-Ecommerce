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
import viewProduct from './components/pages/products/viewProduct'
///color routes-----------------------------
import Colors from './components/pages/colors/colorList'
import AddColor from './components/pages/colors/addColor'
import editColor from './components/pages/colors/editColor'
///sizes routes-----------------------------
import Sizes from './components/pages/sizes/sizeList'
import AddSize from './components/pages/sizes/addSize'
import editSize from './components/pages/sizes/editSize'
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
{ path:'/view-product/:product_id',component:viewProduct},
///colors route-----------------------
{ path:'/colors',component:Colors},
{ path:'/Add-color', component:AddColor},
{ path:'/edit-color/:slug', component:editColor },
///sizes route-----------------------
{ path:'/sizes',component:Sizes},
{ path:'/Add-size', component:AddSize},
{ path:'/edit-size/:slug',component:editSize },
      ]
     
  })

  export default router;