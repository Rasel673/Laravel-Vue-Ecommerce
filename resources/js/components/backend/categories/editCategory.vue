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
              <li class="breadcrumb-item"><a href="#">Category</a></li>
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
                <h3 class="card-title">Update Category</h3>
                 <router-link to="/category" class="btn btn-sm btn-danger float-right">Categories</router-link>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" @submit.prevent="updateCategory">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input
                      type="text" 
                      class="form-control" 
                      id="inputEmail3" 
                      placeholder="Category Name"
                      :class="{ 'is-invalid': form.errors.has('name') }"
                      
                      v-model="form.name"
                      >
                      <has-error :form="form" field="name"></has-error>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Status</label>

                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <div class="form-check">
                        <input 
                        type="radio" 
                        class="form-check-input" 
                        name="status" 
                        id="exampleCheck2"
                        value="1"
                        v-model="form.status"
                        >
                        <label class="form-check-label" for="exampleCheck2">Enable</label>
                      </div>
                    </div>
                  </div>

                   <div class="form-group row pl-1">
                    <div class="offset-sm-2 col-sm-10">
                      <div class="form-check">
                        <input 
                        type="radio" 
                        class="form-check-input" 
                        name="status" id="exampleCheck3" 
                        value="0"
                        v-model="form.status">
                        <label class="form-check-label" for="exampleCheck3">Disable</label>
                      </div>
                    </div>
                     <span   :class="{ 'is-invalid': form.errors.has('status') }"></span>
                    <has-error :form="form" field="status"></has-error>
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
  id:'',  
 name:'',
 status:null,
})
}
},
mounted(){
this.getCategory();
},
methods:{

///get single category information--------------
    getCategory(){
      var slug=this.$route.params.slug;
       let vm=this;
      axios.get('categories/'+slug+'/edit').then((response)=>{
       vm.form.fill(response.data);
      }).catch((error)=>{

      });
    },

  ///Update category-----------------------------
 updateCategory(){
       var slug=this.$route.params.slug;
         let vm=this;
vm.form.put('categories/'+slug).then((response)=>{
  if(response.status==200){
  Toast.fire({
  icon: 'success',
  title: 'Category save successfully'
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