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
              <li class="breadcrumb-item"><a href="#">Order</a></li>
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
                <h3 class="card-title">Order  List</h3>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.L No.</th>
                    <th>Date</th>
                    <th>User Name</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Action</th>
                  </tr>
                  
                  </thead>
                  <tbody>
            
                  <tr v-for="(order,i) in allorders.data" :key="i">
                    <td>{{++i}}</td>
        
                    <td>{{order.created_at}}</td> 
                    <td>{{order.user.name}}</td> 
                    <td>{{order.status}}</td> 
                    <td>{{order.subtotal}}</td> 
                    <td>
                      <router-link :to="`/edit-product/${order.id}`" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></router-link>
                       <router-link :to="`/view-order/${order.id}`" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></router-link>
                      <a class="btn btn-sm btn-danger" @click="remove(order.id)"><i class="fas fa-trash"></i></a>
                    </td>
                
                  </tr>

                  <tr v-if="allorders.data<1">
                    <td class="text-center text-danger" colspan="6">No Data found</td>
                  </tr>
                
                  </tbody>
                  <tfoot>
                  <tr>
                <th>S.L No.</th>
                     <th>Date</th>
                    <th>User Name</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <pagination :data="allorders" @pagination-change-page="getResults"></pagination>
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
 allorders:{}
  }
},
mounted(){
this.getResults();
},
watch:{

},

methods:{
getResults(page = 1) {
			axios.get('/orders?page=' + page)
				.then(response => {
          this.allorders = response.data;
        
         
				});
		},
  ///delete order-------------
 remove(id){
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
    axios.delete('orders/'+id).then((response)=>{

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