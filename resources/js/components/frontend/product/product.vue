<template>
<div>
    <!-- featured-products section start -->
		<section class="single-products  products-two section-padding extra-padding-bottom">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="section-title text-left">
							<h2>Featured Products</h2>
						</div>
					</div>
				</div>
				<div class="wrapper">
					<ul class="load-list load-list-one">
						<li>
						<div class="row text-center">
								<div class="col-xs-12 col-sm-6 col-md-3"  style="margin-top:10px !important" v-for="product in products" :key="product.product_id">
									<div class="single-product" style="border:2px solid #f2f2f2 ! important;">
										<div class="product-img">
											<div class="pro-type">
												<span>new</span>
											</div>
											<router-link :to="`/single-product/${product.product_id}`"><img :src="'product_photo/'+product.product_photo" alt="Product Title" height="350" width="270"/></router-link>
											<div class="actions-btn">
												<router-link :to="`/single-product/${product.product_id}`"><i class="mdi mdi-cart"></i></router-link>
												<!-- <router-link :to="`/single-product/${product.product_id}`"><i class="mdi mdi-eye"></i></router-link> -->
												<a href="#"><i class="mdi mdi-heart"></i></a>
											</div>
										</div>
									
										<div class="product-dsc">
											<p><router-link :to="`/single-product/${product.product_id}`">{{product.product_name}}</router-link></p>
											<span>${{product.product_price}}</span>
										</div>
									</div>
								</div>
								<!-- single product end -->
								
							</div>
						</li>

<!-- before load more button -->




						<!-- <li>
							<div class="row text-center">
								<div class="col-xs-12 col-sm-6 col-md-3">
									<div class="single-product">
										<div class="product-img">
											<div class="pro-type">
												<span>new</span>
											</div>
											<a href="#"><img src="frontend/img/products/20.jpg" alt="Product Title" /></a>
											<div class="actions-btn">
												<a href="#"><i class="mdi mdi-cart"></i></a>
												<a href="#" data-toggle="modal" data-target="#quick-view"><i class="mdi mdi-eye"></i></a>
												<a href="#"><i class="mdi mdi-heart"></i></a>
											</div>
										</div>
										<div class="product-dsc">
											<p><a href="#">men’s White t-shirt</a></p>
											<span>$165.20</span>
										</div>
									</div>
								</div>
							
								<div class="col-xs-12 col-sm-6 col-md-3">
									<div class="single-product">
										<div class="product-img">
											<a href="#"><img src="frontend/img/products/21.jpg" alt="Product Title" /></a>
											<div class="actions-btn">
												<a href="#"><i class="mdi mdi-cart"></i></a>
												<a href="#" data-toggle="modal" data-target="#quick-view"><i class="mdi mdi-eye"></i></a>
												<a href="#"><i class="mdi mdi-heart"></i></a>
											</div>
										</div>
										<div class="product-dsc">
											<p><a href="#">men’s white t-shirt</a></p>
											<span>$57.00</span>
										</div>
									</div>
								</div>
							
								<div class="col-xs-12 col-sm-6 col-md-3 r-margin-top">
									<div class="single-product">
										<div class="product-img">
											<div class="pro-type">
												<span>new</span>
											</div>
											<a href="#"><img src="frontend/img/products/22.jpg" alt="Product Title"/></a>
											<div class="actions-btn">
												<a href="#"><i class="mdi mdi-cart"></i></a>
												<a href="#" data-toggle="modal" data-target="#quick-view"><i class="mdi mdi-eye"></i></a>
												<a href="#"><i class="mdi mdi-heart"></i></a>
											</div>
										</div>
										<div class="product-dsc">
											<p><a href="#">men’s Black t-shirt</a></p>
											<span>$67.00</span>
										</div>
									</div>
								</div>
								
								<div class="col-xs-12 col-sm-6 col-md-3 r-margin-top">
									<div class="single-product">
										<div class="product-img shadow">
											<a href="#"><img src="frontend/img/products/23.jpg" alt="Product Title" /></a>
											<div class="actions-btn">
												<a href="#"><i class="mdi mdi-cart"></i></a>
												<a href="#" data-toggle="modal" data-target="#quick-view"><i class="mdi mdi-eye"></i></a>
												<a href="#"><i class="mdi mdi-heart"></i></a>
											</div>
										</div>
										<div class="product-dsc">
											<p><a href="#">men’s Black t-shirt</a></p>
											<span>$77.00</span>
										</div>
									</div>
								</div>
								
							</div>
						</li> -->
					</ul>
					
					<button  style="margin-top:10px !important" v-if="more"  @click="loadmore(nextPage)">Load More</button>
				
					
				</div>
			</div>
		</section>
		<!-- featured-products section end -->
</div>
</template>

<script>
export default {
data(){
    return{
        products:[],
		more:false,
		nextPage:0,
    }
	
	},
	mounted(){
		// this.$store.dispatch('allProducts');
this.getProduct();
	},
computed:{
// products(){
//  return this.$store.getters.products;
//  }
	},
methods:{
//get front page featured product
getProduct(){
	axios.get('/index').then(
		(response)=>{
			let vm=this;
         this.products=response.data.products.data;
		 if(response.data.products.current_page<response.data.products.last_page){
         vm.more=true;
		 	 vm.nextPage=response.data.products.current_page+1;
		 };
		}
	).catch(
		(error)=>{

		}
	);
},
loadmore(nextPage){
console.log(nextPage);
axios.get('/index?page='+nextPage).then(
		(response)=>{
			let vm=this;
        //  this.products=response.data.products
		 if(response.data.products.current_page<response.data.products.last_page){
         vm.more=true;
		 	 vm.nextPage=response.data.products.current_page+1;
		 }else{
			 vm.more=false;
		 };
		response.data.products.data.forEach(item => {
			vm.products.push(item);
		});
		}
	).catch(
		(error)=>{

		}
	);
}


	}

}
</script>

<style>

</style>