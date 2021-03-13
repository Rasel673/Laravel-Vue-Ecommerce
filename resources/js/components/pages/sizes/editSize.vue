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
              <li class="breadcrumb-item"><a href="#">Size</a></li>
              <li class="breadcrumb-item active">Update</li>
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
                <h3 class="card-title">Update Size</h3>
                 <router-link to="/sizes" class="btn btn-sm btn-danger float-right">sizes</router-link>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" @submit.prevent="updateSize">
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
                  <button type="submit" class="btn btn-info">Update</button>
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
mounted(){
this.getSize();
},
methods:{

///get single Size information--------------
    getSize(){
      var slug=this.$route.params.slug;
       let vm=this;
      axios.get('sizes/'+slug+'/edit').then((response)=>{
       vm.form.fill(response.data);
      }).catch((error)=>{

      });
    },

  ///Update Size-----------------------------
 updateSize(){
       var slug=this.$route.params.slug;
         let vm=this;
vm.form.put('sizes/'+slug).then((response)=>{
  if(response.status==200){
  Toast.fire({
  icon: 'success',
  title: 'Size save successfully'
})
}
}).catch((error)=>{
  Toast.fire({
  icon: 'error',
  title: 'Operation failed'
})
})
  },
  ///reset form----------
 reset(){
    this.form.reset();
  }
}



}
</script>

<style>

</style>