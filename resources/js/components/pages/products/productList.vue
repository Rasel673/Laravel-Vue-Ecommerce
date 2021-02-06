<template>
<div>
       <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item"><a href="#">product</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Product  List</h3>
                <router-link to="/Add-product" class="btn  btn-primary float-right"><i class="fas fa-plus-circle"></i></router-link>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>

                    <th>SL.NO.</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Price</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  
                  </thead>
                  <tbody>
            
                  <tr v-for="(product,i) in allproducts.data" :key="i">
                    <td>{{++i}}</td>
                     <td><img :src="'product_photo/'+product.product_photo" height="80" width="80"></td>
                    <td>{{product.product_name}}</td> 
                    <td>{{product.product_code}}</td> 
                    <td>{{product.product_price}}</td> 
                    <td>{{product.slug}}</td> 
                    <td v-if="product.status==1">
                    <span class="badge badge-success">Active</span>
                    
                    </td>
                    <td v-else>
                        <span class="badge badge-danger">Deactive</span>
                    </td>
                    <td>
                      <router-link :to="`/edit-product/${product.slug}`" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></router-link>
                      <a class="btn btn-sm btn-danger" @click="remove(product.slug)"><i class="fas fa-trash"></i></a>
                    </td>
                
                  </tr>

                  <tr v-if="allproducts.data<1">
                    <td class="text-center text-danger" colspan="6">No Data found</td>
                  </tr>
                
                  </tbody>
                  <tfoot>
                  <tr>
                
                    <th>SL.NO.</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Price</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Actiion</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <pagination :data="allproducts" @pagination-change-page="getResults"></pagination>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    </div>  
</template>

<script>
export default {
    data(){
  return{
 allproducts:{}
  }
},
mounted(){
this.getResults();
},
watch:{

},

methods:{
getResults(page = 1) {
			axios.get('/products?page=' + page)
				.then(response => {
          this.allproducts = response.data.products;
         
				});
		},
  ///delete product-------------
 remove(slug){
   Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    axios.delete('products/'+slug).then((response)=>{

      if(response.status==200){
 Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  this.getResults();
  }
}).catch((error)=>{
Swal.fire(
      'Failed!',
      'Your request failed.',
      'error'
    )
})
    
  }
})

 },


}



}
</script>

<style>

</style>