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
              <li class="breadcrumb-item"><a href="#">size</a></li>
              <li class="breadcrumb-item active">Add</li>
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
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add New size</h3>
                 <router-link to="/sizes" class="btn btn-sm btn-danger float-right">sizes</router-link>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" @submit.prevent="addsize">
                <div class="card-body">

                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Size Name</label>
                    <div class="col-sm-10">
                      <input
                      type="text" 
                      class="form-control" 
                     
                      placeholder="Size Name"
                      :class="{ 'is-invalid': form.errors.has('size_name') }"
                      
                      v-model="form.size_name"
                      >
                      <has-error :form="form" field="size_name"></has-error>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Size Value</label>
                    <div class="col-sm-10">
                      <input
                      type="text" 
                      class="form-control" 
                     
                      placeholder="Size Value"
                      :class="{ 'is-invalid': form.errors.has('size_value') }"
                      
                      v-model="form.size_value"
                      >
                      <has-error :form="form" field="size_value"></has-error>
                    </div>
                  </div>
               
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Save</button>
                  <button type="button" @click="reset()" class="btn btn-default float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
          </div></div></div></section>

  </div>
</template>

<script>
export default {
data(){
  return{

form: new Form({
 size_name:'',
 size_value:'',
})


}
},

methods:{

  ///add size-----------------------------
 addsize(){
this.form.post('/sizes').then((response)=>{
  if(response.status==200){
  Toast.fire({
  icon: 'success',
  title: 'size save successfully'
})
  this.form.reset();
}
}).catch((error)=>{
  Toast.fire({
  icon: 'error',
  title: 'Operation failed'
})
 this.form.reset();
})
  },
 reset(){
    this.form.reset();
  }
}



}
</script>

<style>

</style>