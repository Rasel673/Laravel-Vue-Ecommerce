<template>
<div>
<div v-if="admin==false">
<admin-login></admin-login>
</div>

 <div class="wrapper" v-if="admin==true">
<admin-header></admin-header>
<admin-sidebar></admin-sidebar>     
<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
 <!-- Main content -->
 <router-view></router-view>
    <!-- /.content -->
  </div>
</div>
</div>
</template>
 <script>
 import adminHeader from '../admin/adminHeader';
 import adminSidebar from '../admin/adminSidebar';
 import adminLogin from '../admin/adminLogin';
export default{
  name:"AdminHome",
    data(){
     return{
       login:false
        }
    },
    components:{
       'admin-header':adminHeader,
       'admin-sidebar':adminSidebar,
       'admin-login':adminLogin
    },
    computed:{
      admin(){
       return this.$store.getters.admin;
      }
    }
}
</script>