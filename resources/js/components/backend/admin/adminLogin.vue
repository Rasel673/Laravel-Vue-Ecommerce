<template>
  <div class="hold-transition login-page">
<div class="login-box" >
  <div class="login-logo">
    <router-link to="/login"><b>Admin</b> Login</router-link>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form @submit.prevent="login">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email"  :class="{ 'is-invalid': form.errors.has('email') }" v-model="form.email">
          <has-error :form="form" field="email"></has-error>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" :class="{ 'is-invalid': form.errors.has('password') }" v-model="form.password">
          <has-error :form="form" field="password"></has-error>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
    
  </div>
</div>
<!-- /.login-box -->
  </div>
</template>
<script>
export default {
  data(){
return{
form:new Form({
email:'',
password:'',
}),
getAdmin:{}
}
  },
  methods:{
    login(){
      this.$store.commit("adminLogin",true);
      this.$router.push({path:'/home'});
// axios.get('/sanctum/csrf-cookie').then(response => {
// this.form.post('/login').then((response)=>{
//   console.log(response.data);
// this.getAdminData();
// }).catch((error)=>{
// });
// });
},
///get user data and save vuex store---------------------------
getAdminData(){
axios.get('api/user').then(response=>{
  if(response.status=200)
this.getAdmin=response.data;
this.$store.commit("adminLogin",true);
this.$router.push({path:'/home'});
 Toast.fire({
  icon: 'success',
  title: 'Welcome back'+' '+this.getAdmin.name,
})
}).catch(error=>{
})
},
  }

}
</script>

<style>

</style>
