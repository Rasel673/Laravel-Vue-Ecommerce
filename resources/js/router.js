window.Vue = require('vue');
import VueRouter from 'vue-router'
Vue.use(VueRouter)
//backend routes import==========================================
///admin login------------------
import AdminLogin from './components/backend/admin/adminLogin'
//dash board-----------------------
import Dashboard from './components/backend/dashboard'
///category routes-----------------------------
import Category from './components/backend/categories/categoryList'
import AddCategory from './components/backend/categories/addCategory'
import editCategory from './components/backend/categories/editCategory'
///brands routes---------------------
import  Brands from './components/backend/Brands/brandList'
import addBrand from './components/backend/Brands/addBrand'
import editBrand from './components/backend/Brands/editBrand'
//product routes----------------------
import  Produtcs from './components/backend/products/productList'
import addProcuct from './components/backend/products/addProduct'
import editProduct from './components/backend/products/editProduct'
import viewProduct from './components/backend/products/viewProduct'
///color routes-----------------------------
import Colors from './components/backend/colors/colorList'
import AddColor from './components/backend/colors/addColor'
import editColor from './components/backend/colors/editColor'
///sizes routes-----------------------------
import Sizes from './components/backend/sizes/sizeList'
import AddSize from './components/backend/sizes/addSize'
import editSize from './components/backend/sizes/editSize'
///slider routes-----------------------------
import  Slider from './components/backend/slider/sliderList'
import addSlider from './components/backend/slider/addSlider'
import editSlider from './components/backend/slider/editSlider'
////order routes import -------------------------------
import Order from './components/backend/orders/orderList'
import viewOrder from './components/backend/orders/viewOrder'
import editOrder from './components/backend/orders/editOrder'
 const router=new VueRouter({
  // mode:'history',
  linkActiveClass:'active',
 routes:[
   //admin login-----------------
{
path:'/login',
component:AdminLogin,
},
   ////admin dashboard-----------------
 { path: '/home',
 name:Dashboard,
component:Dashboard },
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
////slider route-------------------------
{ path:'/slider',component:Slider},
{ path:'/Add-slider', component:addSlider },
{ path:'/edit-slider/:slug', component:editSlider },

////order route--------------------
{ path:'/orders',component:Order},
{ path:'/edit-order/:id', component:editOrder },
{ path:'/view-order/:id', component:viewOrder },
]   
  })

  export default router;