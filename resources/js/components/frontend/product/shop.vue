 <template>
  <div>
		<!-- product-list-view content section start -->
        <section class="pages products-page section-padding-bottom section-padding-top">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-4 col-md-3">
						<div class="sidebar left-sidebar">
							<div class="list-group categories">
                    <label class="list-group-item list-group-item-action" aria-current="true">
                    <h4><i class="fa fa-bars" aria-hidden="true"></i> Categories</h4></label>         
                    <button type="button" class="list-group-item list-group-item-action" aria-current="true" v-for="category in categories" :key="category.id">
                      <a @click.prevent="fillterProduct(category.id,'categories_id')"><b>{{category.name}}</b><i class="fa fa-chevron-right" aria-hidden="true"></i></a></button>

                    
                  </div>
							

							<div class="s-side-text">
								<div class="sidebar-title">
									<h4>price</h4>
								</div>
								<div class="range-slider clearfix">
                              <label for="amount">You range: <strong>$10-$100</strong></label>
									 <div class="app-content">
    <vue-range-slider  v-on:drag-end="rangeProduct()" v-model="value" :min="min" :max="max" :enable-cross="enableCross"></vue-range-slider>
  </div>
						
									
								</div>
							</div>
							
							
							<div class="s-side-text">
								<div class="sidebar-title clearfix">
									<h4 class="floatleft">brands</h4>
									<h5 class="floatright"><a>All</a></h5>
								</div>
								<div class="brands-select clearfix">
									<ul>
										<li v-for="brand in brands" :key="brand.id">
											<a @click.prevent="(brand.id,'brand_id')">{{brand.name}}</a>
										</li>
										
									</ul>
								</div>
							</div>


							<div class="s-side-text">
								<div class="banner clearfix">
									<a href="#"><img src="frontend/img/products/banner.jpg" alt="" /></a>
									<div class="banner-text">
										<h2>best</h2> <br/>
										<h2 class="banner-brand">brand</h2>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-8 col-md-9">
						<div class="right-products">
							<div class="row">
								<div class="col-xs-12">
									<div class="section-title clearfix">
										<ul>
											<li>
												<ul class="nav-view">
													<li class="active"><a> <i class="mdi mdi-view-module"></i> </a></li>
													
												</ul>
											</li>
											<li class="sort-by floatright">
												Showing 1-9 of 89 Results
											</li>
										</ul>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="tab-content grid-content">
									<div class="tab-pane fade active in text-center" id="grid">
										<div class="col-xs-12 col-sm-6 col-md-4" v-for="product in products" :key="product.product_id">
											<div class="single-product">
												<div class="product-img">
													<div class="pro-type">
														<span>new</span>
													</div>
												<router-link :to="`/single-product/${product.product_id}`"><img :src="'product_photo/'+product.product_photo" alt="Product Title" height="350" width="270" /></router-link>
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

										<div v-if="products.length<1"><h2 class="text-danger">No data found</h2></div>
									</div>

					              
												
								</div>
					
							</div>

							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-4">
									<button  class="btn btn-danger text-center" v-if="more"  @click="loadmore(nextPage)">Load More</button>
								</div>
								
							</div>
							
							
                            
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- product-list-view content section end -->
  </div>
</template>

<script>
import 'vue-range-component/dist/vue-range-slider.css'
import VueRangeSlider from 'vue-range-component'
export default {
data(){
return{
  products:[],
  more:false,
  nextPage:0,
  categories:[],
  brands:[],
  Productfilter:{},
  productRange:[],
  value:[10,100],
}
},
 created() {
    this.min = 10
    this.max = 1000
    this.enableCross = false
  },
components: {
    VueRangeSlider
  },
mounted(){
	// this.$store.dispatch('allProducts');
this.getProduct();
// this.catProduct();
},
computed:{
// products(){
//  return this.$store.getters.allproducts;
//  }
},
methods:{
	///get single Product information--------------
    // catProduct(){
    //   var id=this.$route.params.id;
    //    let vm=this;
	//    let field='categories_id';
    //   axios.post('/filter',field).then((response)=>{
    //   vm.products=response.data;
    //   }).catch((error)=>{

    //   });
	// },
	//get front page featured product
getProduct(){
	axios.get('/index').then(
		(response)=>{
			let vm=this;
         this.products=response.data.products.data;
         vm.categories=response.data.categories.data;
         vm.brands=response.data.brands;
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
},


getValue(){
// this.value=val;
// console.log(this.value);
this.fillterProduct('',this.value);
},
fillterProduct(data,field){
let vm=this;
this.Productfilter.data=data;
this.Productfilter.field=field;
axios.post('/filter',this.Productfilter).then((response)=>{
vm.products=response.data;
vm.more=false;
}).catch((error)=>{
});


},
rangeProduct(){
	let vm=this;
this.productRange=this.value;
axios.post('/range',this.productRange).then((response)=>{
vm.products=response.data;
vm.more=false;
}).catch((error)=>{
});

}
}
}
</script>

<style scoped>
.app-content {
  padding:40px 15px;
}
</style>

