 <template>
  
		<!-- Checkout content section start -->
		<section class="pages checkout section-padding">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="main-input single-cart-form padding60">
							<div class="log-title">
								<h3><strong>billing details you gave</strong></h3>
							</div>
							<div class="custom-input">
								<form >
									<input type="text"  placeholder="Your name" :value="users.name" readonly />
									<input type="text" placeholder="Enter email your here" :value="users.email" readonly />
									<input type="text"  placeholder="Phone here" :value="users.phone" readonly />
								
									<div class="custom-mess">
										<textarea rows="2" placeholder="Your address here" name="message" :value="users.address" readonly></textarea>
									</div>
								</form>
							</div>
							<div class="checkShip margin-top">
								<label>Check for Shipping another address :</label>
								<input type="checkbox" @click="shippingDisplay" />
								<div/>
						</div>
					</div>
					</div>					

					<div class="col-sm-6" v-if="shippingStatus">
						<div class="main-input single-cart-form padding60">
							<div class="log-title">
								<h3><strong>ship to different address</strong></h3>
							</div>
							<div class="custom-input">
								<form action="mail.php" method="post">
									<input type="text" v-model="Shipping_address.name" placeholder="Reciever name" />
									<input type="text" v-model="Shipping_address.email" placeholder="Reciever email here" />
									<input type="text" v-model="Shipping_address.phone" placeholder="Reciever Phone here" />
									<div class="custom-mess">
										<textarea rows="2" v-model="Shipping_address.address" placeholder="Place address here..."></textarea>
									</div>
								</form>
							</div>
						</div>
					</div>
				
			</div>

				<div class="row margin-top">
					<div class="col-xs-12 col-sm-6">
						<div class="padding60">
							<div class="log-title">
								<h3><strong>Our order</strong></h3>
							</div>
							<div class="cart-form-text pay-details table-responsive">
								<table>
									<thead>
										<tr>
											<th>Product</th>
											<td>Total</td>
										</tr>
									</thead>
									<tbody>
										<tr v-for="(cart,index) in carts" :key="index">
											<th>{{cart.product.product_name}}  x {{cart.qty}}</th>
											<td>${{cart.qty*cart.product.product_price}}</td>
										</tr>
										
										<tr>
											<th>Cart Subtotal</th>
											<td>${{total}}</td>
										</tr>
									
										<tr>
											<th>Vat</th>
											<td>${{total*(4/100)}}</td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<th>Order total</th>
											<td>${{total+total*(4/100)}}</td>
										</tr>
									</tfoot>
								</table>
							</div>

						</div>
					</div>
					<div class="col-xs-12 col-sm-6">
						<div class="padding60">
							<div class="log-title">
								<h3><strong>Payment method</strong></h3>
							</div>
							<div class="categories">
								<ul id="accordion" class="panel-group clearfix">
									<li class="panel">
										<div data-toggle="collapse" data-parent="#accordion" data-target="#collapse1">
											<div class="medium-a">
												Cash on  Delivery
											</div>
										</div>
										<div class="panel-collapse collapse in" id="collapse1">
											<div class="normal-a">
												
												<p>Pay money after recieving product.</p>
											</div>
										</div>
									</li>
									<li class="panel">
										<div data-toggle="collapse" data-parent="#accordion" data-target="#collapse3">
											<div class="medium-a">
												paypal
											</div>
										</div>
										<div class="paypal-dsc panel-collapse collapse" id="collapse3">
											<div class="normal-a">
												<p>Lorem Ipsum is simply in dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.</p>
											</div>
										</div>
									</li>
								</ul>
								<div class="submit-text" v-if="total>1">
									<a @click.prevent="order">place order</a>
								</div>
							</div>

						</div>
					</div>
				</div>

				
			</div>
			
		</section>
		<!-- Checkout content section end -->
</template>

<script>
export default {
data(){
 return{
Shipping_address:{
name:"",
email:"",
phone:"",
address:"",	
},
shippingStatus:false,
Payment_type:{
 cashONdelivery:'Cash on Delivery',
 Online:'',
},

    }
},
watch:{

},
computed:{
carts(){
    return this.$store.getters.getCart;
    
},
total(){
    return this.$store.getters.getTotal;
},
users(){
    return this.$store.getters.user;
}

 },
 methods:{
	 shippingDisplay(){
this.shippingStatus=!this.shippingStatus
	 },
	 order(){
		axios.post('/order',{
			billing:this.users,
			shipping:this.Shipping_address,
			carts:this.carts,
			total:this.total,
			payment:this.Payment_type,
			shipStatus:this.shippingStatus
		}).then((response)=>{
       if(response.status==200){
		 this.$store.commit("clearCart");
		 Swal.fire(
 	 	'Congratulation!',
  		'Your order recieved',
  		'success'
		)
	   }else{
		   Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Something went wrong!',
			footer: 'Please login and try again'
			})
	   }
		}).catch((error)=>{
		Swal.fire(
 	 	'Opps!',
  		'Your order failed',
  		'error'
		)
		});
	 }
 }
}
</script>

<style>

</style>