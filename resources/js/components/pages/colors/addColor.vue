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
              <li class="breadcrumb-item"><a href="#">color</a></li>
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
                <h3 class="card-title">Add New color</h3>
                 <router-link to="/colors" class="btn btn-sm btn-danger float-right">colors</router-link>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" @submit.prevent="addcolor">
                <div class="card-body">

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Color Name</label>
                    <div class="col-sm-10">
                      <input
                      type="text" 
                      class="form-control" 
                      id="inputEmail3" 
                      placeholder="color Name"
                      :class="{ 'is-invalid': form.errors.has('color_name') }"
                      
                      v-model="form.color_name"
                      >
                      <has-error :form="form" field="color_name"></has-error>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Color Value</label>
                    <div class="col-sm-10">
                      <input
                      type="text" 
                      class="form-control" 
                      id="inputEmail3" 
                      placeholder="color value"
                      :class="{ 'is-invalid': form.errors.has('color_value') }"
                      
                      v-model="form.color_value"
                      >
                      <has-error :form="form" field="color_value"></has-error>
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
 color_name:'',
 color_value:''
})
}
},

methods:{

  ///add color-----------------------------
 addcolor(){
this.form.post('/colors').then((response)=>{
  if(response.status==200){
  Toast.fire({
  icon: 'success',
  title: 'color save successfully'
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