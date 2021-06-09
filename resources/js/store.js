window.Vue = require('vue');
import axios from 'axios';
import Vuex from 'vuex'
import createPersistedState from "vuex-persistedstate"
Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
      categories:[],
      products:[],
      cart:[],
      product:[],
      color:'',
      size:'',
      user:{},
      auth:false,
      adminAuth:false,
    },
  getters:{
   categories(state){
return state.categories;
   },
   allproducts(state){
    return state.products;
       },
   getCart(state){
     return state.cart;
   },
   getTotal(state){
    var total=0;
    for(var i=0; i<state.cart.length;i++){
      var item=state.cart[i];
      total +=item.product.product_price*item.qty
  }
  return total;
   },
  user(state){
return state.user;
   },
   authenicated(state){
   return state.auth;
   },
   admin(state){
return state.adminAuth;
   }
  },
    actions:{
      allCategory(data){
        axios.get('/categories').then(response=>{
           data.commit('getCategories', response.data.categories.data);
        }).catch(error=>{
        });
      },
      allProducts(){
        axios.get('/index').then(response=>{
         
          data.commit('getProducts', response.data.products.data);
        
       }).catch(error=>{
       });
      },
      // adminLogin(data){
      //   axios.post().then(response=>{
      //   }).catch(error=>{

      //   });
      // }

    },
mutations: {
   getCategories(state,data){
      return state.categories=data;
    },
    getProducts(state,data){
return state.products=data;
    },
   addToCart(state,payload){
  state.cart.push(payload);
  if(payload){
    Toast.fire({
    icon: 'success',
    title: 'product add successfully'
  })
}
    },
    removeCart(state,payload){
   state.cart.splice(payload,1);
    },
    clearCart(state){
      state.cart=[];
       },
    getUser(state,payload){
    state.user=payload;
    },
    // logOut(state){
    // state.user=null;
    // },
    authenicatedUser(state,payload){
      state.auth=payload;
    },
    adminLogin(state,payload){
       state.adminAuth=payload;
    }
       
    },
  
    plugins: [createPersistedState()]
  })

  export default store;