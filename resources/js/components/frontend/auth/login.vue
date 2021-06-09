 <template>
  		<!-- login content section start -->
		<section class="pages login-page section-padding">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="main-input padding60">
							<div class="log-title">
								<h3><strong>registered customers</strong></h3>
							</div>
							<div class="login-text">
								<div class="custom-input">
									<p>If you have an account with us, Please log in!</p>
									
										<input type="text"  placeholder="Email"  :class="{ 'is-invalid': form.errors.has('email') }" v-model="form.email" />
										<has-error :form="form" field="email"></has-error>
										<input type="password"  placeholder="Password" :class="{ 'is-invalid': form.errors.has('password') }" v-model="form.password"/>
										<has-error :form="form" field="password"></has-error>
										<a class="forget" href="#">Forget your password?</a>
										<div class="submit-text">
										<a @click="login">login</a>
										</div>
								
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="main-input padding60 new-customer">
							<div class="log-title">
								<h3><strong>new customers</strong></h3>
							</div>
							<div class="custom-input">
								<form >
									<has-error :form="registerForm" field="name"></has-error>
									<input type="text"  placeholder="Name here.." :class="{ 'is-invalid': registerForm.errors.has('name') }" v-model="registerForm.name" autocomplete required />
								

									<has-error :form="registerForm" field="email"></has-error>
									<input type="text" placeholder="Email Address.." :class="{ 'is-invalid': registerForm.errors.has('email') }" v-model="registerForm.email" autocomplete required />
									

									<has-error :form="registerForm" field="phone"></has-error>
									<input type="text"  placeholder="Phone Number.." :class="{ 'is-invalid': registerForm.errors.has('phone') }" v-model="registerForm.phone"  required/>
									

									<has-error :form="registerForm" field="password"></has-error>
									<input type="password"  placeholder="Your Password" :class="{ 'is-invalid': registerForm.errors.has('password') }"  v-model="registerForm.password" autocomplete  required/>
									

									<has-error :form="registerForm" field="password_confirmation"></has-error>
									<input type="password"  placeholder="Confirm Password" :class="{ 'is-invalid': registerForm.errors.has('password_confirmation') }" v-model="registerForm.password_confirmation" autocomplete required/>
									
									<!-- <label class="first-child">
										<input type="radio" name="rememberme" value="forever">
										Sign up for our newsletter!
									</label> -->
									<div class="submit-text coupon">
										<a @click.prevent="register">Register</a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- login content section end -->
</template>

<script>
export default {
data(){
    return{
form:new Form({
email:'',
password:'',
}),
registerForm:new Form({
	name:'',
	email:'',
	phone:'',
	password:'',
	password_confirmation:''
}),
getUser:{},
    }
},
// mounted(){
// this.getUserData();
// },
methods:{
login(){
axios.get('/sanctum/csrf-cookie').then(response => {
this.form.post('/login').then((response)=>{
this.getUserData();
}).catch((error)=>{

});
});
},
///get user data and save vuex store---------------------------
getUserData(){
axios.get('api/user').then(response=>{
this.getUser=response.data;
this.$store.commit("authenicatedUser",true);
this.$store.commit("getUser",{
id:this.getUser.id,
name:this.getUser.name,
email:this.getUser.email,
phone:this.getUser.phone,
address:this.getUser.address,
}
);
this.$router.push({path:'/my-account'});
 Toast.fire({
  icon: 'success',
  title: 'Welcome back'+' '+this.getUser.name,
})
}).catch(error=>{
})
},

register(){
    this.registerForm.post('/register').then((response)=>{
	this.$store.commit("authenicatedUser",true);
	this.$store.commit("getUser",{	
	name:this.registerForm.name,
	email:this.registerForm.email,
	phone:this.registerForm.phone,
	address:'',
});
this.$router.push({path:'/my-account'});
Toast.fire({
  icon: 'success',
  title: 'Welcome back'+' '+this.registerForm.name
})	
    }).catch((error)=>{
Toast.fire({
  icon: 'error',
  title: 'Something went wrong'
})
    })
}
}
}
</script>

<style>

</style>