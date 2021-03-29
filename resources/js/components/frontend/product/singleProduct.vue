<template>
<div>
    <!-- quick view start -->
		<div class="product-details quick-view animated zoomInUp">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						 <div class="d-table">
							<div class="d-tablecell">
								<div class="modal-dialog">
									<div class="main-view modal-content">
										<!-- <div class="modal-footer" data-dismiss="modal">
											<span>x</span>
										</div> -->
										<div class="row">
											<div class="col-xs-12 col-sm-5 col-md-4">
												<div class="quick-image">
													<div class="single-quick-image text-center">
														<div class="list-img">
															<div class="product-img tab-content">
																<!-- <div class="simpleLens-container tab-pane fade in" id="sin-1">
																	<div class="pro-type">
																		<span>new</span>
																	</div>
																	<a class="simpleLens-image" data-lens-image="frontend/img/products/z1.jpg" href="#"><img src="frontend/img/products/z1.jpg" alt="" class="simpleLens-big-image"></a>
																</div> -->

																<!-- <div class="simpleLens-container tab-pane active fade in" id="sin-2" v-for="product in products.product" :key="product.product_id">
																	<div class="pro-type sell">
																		<span>sell</span>
																	</div>
																	<a class="simpleLens-image" data-lens-image="frontend/img/products/z1.jpg" href="#"><img src="frontend/img/products/z1.jpg" alt="" class="simpleLens-big-image"></a>
																</div> -->


																<div class="simpleLens-container tab-pane active fade in" id="sin-2" v-for="product in products.product" :key="product.product_id">
																	<div class="pro-type sell">
																		<span>sell</span>
																	</div>
																	<a class="simpleLens-image" :data-lens-image="'Product_photo/'+product.product_photo" href="#"><img :src="'Product_photo/'+product.product_photo" alt="" class="simpleLens-big-image" height="470" width="610"></a>
																</div>

																<!-- <div class="simpleLens-container tab-pane fade in" id="sin-3">
																	<div class="pro-type">
																		<span>-15%</span>
																	</div>
																	<a class="simpleLens-image" data-lens-image="frontend/img/products/z3.jpg" href="#"><img src="frontend/img/products/z3.jpg" alt="" class="simpleLens-big-image"></a>
																</div> -->
																<!-- <div class="simpleLens-container tab-pane fade in" id="sin-4">
																	<div class="pro-type">
																		<span>new</span>
																	</div>
																	<a class="simpleLens-image" data-lens-image="frontend/img/products/z4.jpg" href="#"><img src="frontend/img/products/z4.jpg" alt="" class="simpleLens-big-image"></a>
																</div> -->
															</div>
														</div>
													</div>
														<!-- product sub images -->
													<!-- <div class="quick-thumb">
														<ul class="product-slider">
															<li><a data-toggle="tab" href="#sin-1"> <img src="frontend/img/products/s1.jpg" alt="quick view" /> </a></li>
															<li class="active"><a data-toggle="tab" href="#sin-2"> <img src="frontend/img/products/s2.jpg" alt="small image" /> </a></li>
															<li><a data-toggle="tab" href="#sin-3"> <img src="frontend/img/products/s3.jpg" alt="small image" /> </a></li>
															<li><a data-toggle="tab" href="#sin-4"> <img src="frontend/img/products/s4.jpg" alt="small image" /> </a></li>
														</ul>
													</div> -->
														<div class="share-tag clearfix">
															<ul class="blog-share floatleft">
																<li><h5>share </h5></li>
																<li><a href="#"><i class="mdi mdi-facebook"></i></a></li>
																<li><a href="#"><i class="mdi mdi-twitter"></i></a></li>
																<li><a href="#"><i class="mdi mdi-linkedin"></i></a></li>
																<li><a href="#"><i class="mdi mdi-vimeo"></i></a></li>
																<li><a href="#"><i class="mdi mdi-dribbble"></i></a></li>
																<li><a href="#"><i class="mdi mdi-instagram"></i></a></li>
															</ul>
														</div>
												</div>						
											</div>


											<div class="col-xs-12 col-sm-7 col-md-8">
												<div class="quick-right">
													<div class="list-text" v-for="product in products.product" :key="product.product_id">

														
														<h3>{{product.product_name}}</h3>
														<span>{{product.category}}</span>
												<!-- rating star of product -->
														<!-- <div class="ratting floatright">
															<p>( 27 Rating )</p>
															<i class="mdi mdi-star"></i>
															<i class="mdi mdi-star"></i>
															<i class="mdi mdi-star"></i>
															<i class="mdi mdi-star-half"></i>
															<i class="mdi mdi-star-outline"></i>
														</div> -->
														<h5>
															<!-- <del>$79.30</del>  -->
															${{product.product_price}}</h5>
														<p v-html="product.product_description"></p>
														
														
														<div class="all-choose">

															<div class="s-shoose" v-if="products.colors!=null">
																<h5>Color</h5>
																<div class="color-select clearfix">

																	<select class="custom-select" style="border:2px solid gray;">
																		<option selected>Choose color...</option>
																		<option v-for="color in products.colors" :key="color.color_id" :value="color.color_id"><strong>{{color.color_name}}</strong></option>
																	</select>
																	<!-- <ul class="list-inline">
																	<li  class="list-inline-item" v-for="color in products.colors" :key="color.color_id"><button>{{color.color_name}}</button>
																	</li></ul>
																	<span></span>
																	<span class="outline"></span>
																	<span></span>
																	<span></span> -->
																</div>
															</div>
														
															<div class="s-shoose" v-if="products.sizes!=null">
																<h5>size</h5>
																<div class="size-drop">
																	
																		<!-- <button type="button" class="btn">XL</button> -->
																		<!-- <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																			<span class=""><i class="mdi mdi-chevron-down"></i></span>
																		</button> -->

																		<select class="custom-select" style="border:2px solid gray;">
																		<option selected><h5>Choose Size...</h5></option>
																		<option v-for="size in products.sizes" :key="size.size_id"><strong>{{size.size_name}}</strong></option>
																	</select>
																		<!-- <ul class="dropdown-menu">
																			<li v-for="size in products.sizes" :key="size.size_id"><a href="#">{{size.size_name}}</a></li>
																			<li><a href="#">SL</a></li>
																			<li><a href="#">S</a></li>
																			<li><a href="#">L</a></li>
																		</ul> -->
																	
																</div>
															</div>

															<div class="s-shoose">
																<h5>qty</h5>
																<form action="#" method="POST">
																	<div class="plus-minus">
																		<a class="dec qtybutton">-</a>
																		<input type="text" value="02" name="qtybutton" class="plus-minus-box">
																		<a class="inc qtybutton">+</a>
																	</div>
																</form>
															</div>

														</div>




														<div class="list-btn">
															<a href="#">add to cart</a>
															<a href="#">wishlist</a>
															<a href="#">zoom</a>
														</div>

														<!-- <div class="share-tag clearfix">
															<ul class="blog-share floatleft">
																<li><h5>share </h5></li>
																<li><a href="#"><i class="mdi mdi-facebook"></i></a></li>
																<li><a href="#"><i class="mdi mdi-twitter"></i></a></li>
																<li><a href="#"><i class="mdi mdi-linkedin"></i></a></li>
																<li><a href="#"><i class="mdi mdi-vimeo"></i></a></li>
																<li><a href="#"><i class="mdi mdi-dribbble"></i></a></li>
																<li><a href="#"><i class="mdi mdi-instagram"></i></a></li>
															</ul>
														</div> -->

													</div>
												</div>
											</div>
										</div>


									</div>

							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- quick view end -->
</div>

</template>

<script>
export default {
data(){
    return{
products:[],
    }
},
mounted(){
this.getProduct();
},
methods:{
	///get single Product information--------------
    getProduct(){
      var id=this.$route.params.product_id;
       let vm=this;
      axios.get('products/'+id).then((response)=>{
       vm.products=response.data;
       
      }).catch((error)=>{

      });
    },
}
}
</script>

<style>

</style>