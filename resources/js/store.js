window.Vue = require('vue');
import Vuex from 'vuex'
Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
      categories:[]

    },
    getters:{
   categories(state){
return state.categories;
   }
 
    },
    actions:{
      allCategory(data){
        axios.get('/categories').then(response=>{
           data.commit('getCategories', response.data.categories.data);
        }).catch(error=>{
    
        });
      }
    },
    mutations: {
   getCategories(state,data){
      return state.categories=data;
    }
      
    }
  })

  export default store;