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
                                <li><a href="#">My account</a></li>
                                <!-- @else -->
                                <li><a href="#">Login</a></li>

                                <!-- @if (Route::has('register')) -->
                                <li><a href="#">Registar</a></li>
                                <!-- @endif
                                
                                @endauth -->
                                
                            </ul>
                            <!-- @endif -->
                        </li>
                        <li>
                            <a href="#"><i class="mdi mdi-settings"></i></a>
                            <ul>
                                <li><a href="my-account.html">My account</a></li>
                                <li><a href="cart.html">My cart</a></li>
                                <li><a href="wishlist.html">My wishlist</a></li>
                                <li><a href="checkout.html">Check out</a></li>
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
										<li><router-link to="/">Home</router-link>
									
										</li>
										<li><a href="shop.html">Shop</a>
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
											<li><a href="index.html">Home</a>
											
											<li><a href="shop.html">Shop</a>
												
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
            02 items :  <strong>$86.00</strong>
        </a>
        <div class="cartdrop">
            <div class="sin-itme clearfix">
                <i class="mdi mdi-close"></i>
                <a class="cart-img" href="cart.html"><img src="frontend/img/cart/1.png" alt="" /></a>
                <div class="menu-cart-text">
                    <a href="#"><h5>men’s black t-shirt</h5></a>
                    <span>Color :  Black</span>
                    <span>Size :     SL</span>
                    <strong>$122.00</strong>
                </div>
            </div>
            <div class="sin-itme clearfix">
                <i class="mdi mdi-close"></i>
                <a class="cart-img" href="cart.html"><img src="frontend/img/cart/2.png" alt="" /></a>
                <div class="menu-cart-text">
                    <a href="#"><h5>men’s black t-shirt</h5></a>
                    <span>Color :  Black</span>
                    <span>Size :     SL</span>
                    <strong>$132.00</strong>
                </div>
            </div>
            <div class="total">
                <span>total <strong>= $306.00</strong></span>
            </div>
            <a class="goto" href="cart.html">go to cart</a>
            <a class="out-menu" href="checkout.html">Check out</a>
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
}
}
</script>