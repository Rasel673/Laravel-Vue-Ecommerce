<template>

    	<header class="header-one header-two" style="margin-bottom:1px !important;">
		<!-- {{-- header section here --}} -->
			
				<div class="container-fluid text-center">
				<div class="row">
                    <div class="header-top-two">
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-12">
                <div class="middel-top">
                    <div class="left floatleft">
                        <p><i class="mdi mdi-clock"></i> Mon-Fri : 09:00-19:00</p>
                    </div>
                </div>


                <div class="middel-top clearfix">
                    <!-- @if (Route::has('login')) -->
                    <ul class="clearfix right floatright">

                        <li>
                            <a href="#"><i class="mdi mdi-account"></i></a>
                            <ul>
                            
                                <!-- @auth -->
                                <li v-if="authenicted"><router-link  to="/my-account">My Account</router-link></li>
                                <!-- @else -->
                                <li v-if="!authenicted"><router-link  to="/login">Login</router-link></li>
                                <li v-if="authenicted"><a href="#" @click.prevent="logout()">Logout</a></li>

                                <!-- @if (Route::has('register')) -->
                                <li v-if="!authenicted"><a href="#">Registar</a></li>
                                <!-- @endif
                                
                                @endauth -->
                                
                            </ul>
                            <!-- @endif -->
                        </li>
                        <li>
                            <a href="#"><i class="mdi mdi-settings"></i></a>
                            <ul>
                                <li v-if="authenicted"><router-link  to="/my-account">My Account</router-link></li>
                                <li><router-link to="/cart">My cart</router-link></li>
                                <li><router-link to="/wishlist">My wishlist</router-link></li>
                                <li><router-link to="/checkout">Checkout</router-link></li>
                              
                            </ul>
                        </li>
                    </ul>
                    <div class="right floatright">
                        <form  method="get">
                            <button type="submit"><i class="mdi mdi-magnify"></i></button>
                            <input type="text" placeholder="Search within these results..." />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- menu bar start here -->
<div class="col-sm-3">
	<div class="logo">
		<a href="index.html"><img src="frontend/img/logo2.png" alt="Sellshop" /></a>
		
	</div>
</div>
					<div class="col-sm-7">
						<div class="header-middel">
							<div class="mainmenu">
								<nav>
									<ul>
										<li><router-link active-class="active" exact to="/">Home</router-link>
									
										</li>


										<li><router-link active-class="active" exact to="/shop">Shop</router-link>
										</li>
										
										<li><a href="blog.html">Blog</a>
									
										</li>
										<li><a href="about.html">About</a></li>
										<li><a href="contact.html">Contact</a></li>
									</ul>
								</nav>
							</div>
							<!-- mobile menu start -->
							<div class="mobile-menu-area">
								<div class="mobile-menu">
									<nav id="dropdown">
										<ul>
											<li><router-link to="/">Home</router-link></li>
											
										<li><router-link to="/shop">Home</router-link>
												
													</li>
													
											
											
											<li><a href="blog.html">Blog</a>
												
											</li>
											<li><a href="about.html">About</a></li>
											<li><a href="contact.html">Contact</a></li>
										</ul>
									</nav>
								</div>
							</div>
						</div>
					</div>


                    <!-- cart item show here -->
                    <div class="col-sm-2">
    <div class="cart-itmes">
        <a class="cart-itme-a" href="cart.html">
            <i class="mdi mdi-cart"></i>
            {{carts.length}} items :  <strong>${{total}}</strong>
        </a>
        <div class="cartdrop">
             
            <div class="sin-itme clearfix" v-for="(cart,index) in carts" :key="index">
                <i class="mdi mdi-close"  @click="remove(index)"></i>
                <a class="cart-img" href="cart.html"><img :src="'Product_photo/'+cart.product.product_photo" alt=""  height="108" width="83"/></a>
                <div class="menu-cart-text">
                    <a href="#"><h5>{{cart.product.product_name}}</h5></a>
                    <span v-if="cart.color !=null">Color :  {{cart.color}}</span>
                    <span v-if="cart.size !=null">Size :   {{cart.size}}</span>
                    <span>Quantity :  {{cart.qty}}</span>
                    <strong>${{cart.product.product_price}}</strong>
                </div>
            </div>

            <div class="sin-itme clearfix" v-if="carts.length==0">
                <div class="menu-cart-text text-center">
                    <a><h5>No item selected..</h5></a>
                    <span>Please choose your product.</span>
                    
                </div>
            </div>
            <div class="total">
                <span>total <strong>= ${{total}}</strong></span>
            </div>
            <router-link class="goto" to="/cart">go to cart</router-link>
            <router-link class="out-menu" to="/checkout">Check out</router-link>
        </div>
    </div>
</div>
	</div>
			</div>
		</header>
		<!-- header section end -->
</template>
<script>
export default{
name:"top-header",
data(){
    return{
        
    }
},
computed:{
carts(){
    return this.$store.getters.getCart;
    
},
total(){
    return this.$store.getters.getTotal;
},
authenicted(){
return this.$store.getters.authenicated;
}
 },
 methods:{
     remove(index){
         this.$store.commit("removeCart",index);
     },
     logout(){
         axios.post('/logout').then(resposnse=>{
       this.$store.commit("authenicatedUser",false);
    //    this.$store.dispatch("logOut");
       this.$router.push({path:'/login'});
        Toast.fire({
  icon: 'success',
  title: 'Good Bye! See you again'
})
         }).catch(error=>{

         });
     }
 }
}
</script>