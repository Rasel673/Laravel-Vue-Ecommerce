 <template>
  <div>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Products</a></li>
              <li class="breadcrumb-item active">Information</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8 offset-2">

            <!-- Horizontal Form -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Product Information</h3>
                 <router-link to="/products" class="btn btn-sm btn-danger float-right">Products</router-link>
              </div>
              <!-- /.card-header -->
            <table class="table table-hover table-dark table-striped">


  <tbody v-for="product in products.product" :key="product.product_id">
   <td colspan="2"><img :src="'Product_photo/'+product.product_photo" class="thumbnile" height="200" width="100%"/></td>
    <tr>
      <th>Product Name :</th>
      <td>{{product.product_name}}</td>
    </tr>
    <tr>
      <th>Product Code :</th>
      <td>{{product.product_code}}</td>
    </tr>
   <tr>
      <th>Product Price :</th>
      <td>{{product.product_price}}</td>
    </tr>
    <tr>
      <th>Product Quantity :</th>
      <td>{{product.product_qty}}</td>
    </tr>
    <tr>
      <th>Product Category :</th>
      <td>{{product.category}}</td>
    </tr>
    <tr>
      <th>Product Brand :</th>
      <td>{{product.brand}}</td>
    </tr>
    <tr>
      <th>Product Status :</th>
      <td v-if="product.status==1">Published</td>
      <td v-else>Unpublished</td>
    </tr>
    <tr>
      <th>Product Description :</th>
      <td v-html="product.product_description"></td>
    </tr>
    
  </tbody>
  <tfoot>
    <tr>
      <th>Product Colors</th>
    <td><ul class="list-inline"><li  class="list-inline-item" v-for="color in products.colors" :key="color.color_id">{{color.color_name}}</li></ul></td>
    </tr>
    <tr>
      <th>Product Sizes</th>
    <td><ul class="list-inline"><li class="list-inline-item" v-for="size in products.sizes" :key="size.size_id">{{size.size_name}}</li></ul></td>
    </tr>
  </tfoot>
</table>
            </div>
            <!-- /.card -->
          </div></div></div></section>

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