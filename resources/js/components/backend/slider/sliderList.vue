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
              <li class="breadcrumb-item"><a href="#">Slider</a></li>
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
                <h3 class="card-title">Slider List</h3>
                <router-link to="/Add-slider" class="btn  btn-primary float-right"><i class="fas fa-plus-circle"></i></router-link>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>

                    <th>SL.NO.</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  
                  </thead>
                  <tbody>
            
                  <tr v-for="(slider,i) in allsliders.data" :key="i">
                    <td>{{++i}}</td>
                     <td><img :src="'Slider_photo/'+slider.image" height="80" width="80"></td>
                    <td>{{slider.title}}</td> 
                    <td>{{slider.description}}</td> 
                    <td v-if="slider.status==1">
                    <span class="badge badge-success">Active</span>
                    
                    </td>
                    <td v-else>
                        <span class="badge badge-danger">Deactive</span>
                    </td>
                    <td>
                      <router-link :to="`/edit-slider/${slider.slug}`" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></router-link>
                      <a class="btn btn-sm btn-danger" @click="remove(slider.slug)"><i class="fas fa-trash"></i></a>
                    </td>
                
                  </tr>

                  <tr v-if="allsliders.data<1">
                    <td class="text-center text-danger" colspan="6">No Data found</td>
                  </tr>
                
                  </tbody>
                  <tfoot>
                  <tr>
                
                    <th>SL.NO.</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actiion</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <pagination :data="allsliders" @pagination-change-page="getResults"></pagination>
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
 allsliders:{}
  }
},
mounted(){
this.getResults();
},
watch:{

},

methods:{
getResults(page = 1) {
			axios.get('/sliders?page=' + page)
				.then(response => {
          this.allsliders = response.data.sliders;
				});
		},
  ///delete slider-------------
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
    axios.delete('sliders/'+slug).then((response)=>{

      if(response.status==200){
 Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  this.getResults();
  }else if(response.status==500){
    Swal.fire(
      'Failed!',
      'Product of this slider exist.',
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