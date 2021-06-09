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
              <li class="breadcrumb-item"><a href="#">size</a></li>
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
                <h3 class="card-title">Size List</h3>
                <router-link to="/Add-size" class="btn  btn-primary float-right"><i class="fas fa-plus-circle"></i></router-link>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                
                    <th>SL.NO.</th>
                    <th>Name</th>
                    <th>Value</th>
                    <th>Slug</th>
                    <th>Action</th>
                  </tr>
                  
                  </thead>
                  <tbody>
            
                  <tr v-for="(size,i) in allsizes.data" :key="i">
                    <td>{{++i}}</td>
                    <td>{{size.size_name}}</td> 
                    <td>{{size.size_value}}</td> 
                    <td>{{size.slug}}</td> 
                    <!-- <td v-if="size.status==1">
                        <span class="badge badge-success">Active</span> -->
                      <!-- Checked switch
<div class="custom-control custom-switch">
  <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
  <label class="custom-control-label" for="customSwitch1"></label>
</div> -->
                    <!-- </td>
                    <td v-else>
                        <span class="badge badge-danger">Deactive</span>
                    </td> -->
                    <td>
                      <router-link :to="`/edit-size/${size.slug}`" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></router-link>
                      <a class="btn btn-sm btn-danger" @click="remove(size.slug)"><i class="fas fa-trash"></i></a>
                    </td>
                
                  </tr>

                  <tr v-if="allsizes.length<1">
                    <td class="text-center text-danger" colspan="6">No Data found</td>
                  </tr>
                
                  </tbody>
                  <tfoot>
                  <tr>
                    <th v-if="allsizes.length>0"></th>
                    <th>SL.NO.</th>
                    <th>Name</th>
                    <th>Value</th>
                    <th>Slug</th>
                    <th>Actiion</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <pagination :data="allsizes" @pagination-change-page="getResults"></pagination>
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
import pagination from 'laravel-vue-pagination'
export default {
data(){
  return{
 allsizes:{}
  }
},
mounted(){
 this.getResults();

},
watch:{
 
},
computed:{
  
},
methods:{
getResults(page = 1) {
			axios.get('/sizes?page=' + page)
				.then(response => {
          this.allsizes = response.data.sizes;
				}).catch((error)=>{
          console.log("something went wrong")
        });
		},
  ///delete size-------------
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
    axios.delete('sizes/'+slug).then((response)=>{

      if(response.status==200){
 Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
 this.getResults();
  }else if(response.status==400){
    Swal.fire(
      'Failed!',
      'Product of this size exist.',
      'error'
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