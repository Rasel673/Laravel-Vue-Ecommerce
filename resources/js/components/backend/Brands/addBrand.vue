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
              <li class="breadcrumb-item"><a href="#">Brand</a></li>
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
                <h3 class="card-title">Add New Brand</h3>
                 <router-link to="/brands" class="btn btn-sm btn-danger float-right">Brands</router-link>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" @submit.prevent="addBrand" enctype="multipart/form-data"> 
                <div class="card-body">

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input
                      type="text" 
                      class="form-control" 
                      id="inputEmail3" 
                      placeholder="Brand Name"
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

                     <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                      <input
                      type="file" 
                      class="form-control" 
                      id="inputEmail3" 
                      placeholder="Brand Image"
                      :class="{ 'is-invalid': form.errors.has('image') }"
                      
                      @change="imageUpload"
                      
                      >
                      <has-error :form="form" field="image"></has-error>
                    </div>
                  </div>

                  <div class="form-group row" v-if="upImage">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                       <img :src="form.image" class="thumbnile" height="100" width="150"/>
                    </div>
                  </div>
                  
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Save</button>
                  <button type="button" @click="reset" class="btn btn-default float-right">Cancel</button>
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
 name:'',
 status:null,
 image:''
}),
upImage:false


}
},

methods:{

  ///add Brand-----------------------------
 addBrand(){
  //   const config = {
  // headers: { 'content-type': 'multipart/form-data'}
  // }
    // let formData = new FormData();
    // formData.append('name', this.form.name);
    // formData.append('status', this.form.status);
    // formData.append('image', this.form.image);

this.form.post('/brands').then((response)=>{
  console.log(response.data);
  if(response.status==200){
  Toast.fire({
  icon: 'success',
  title: 'Brand save successfully'
})
  this.reset();
  this.form.image='';
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
   this.upImage=false;

  },

  imageUpload(e){
    let file=e.target.files[0];
    if(file.type=='image/png'|| file.type=='image/jpg' || file.type=='image/jpeg'){
  var fileReader=new FileReader();
  fileReader.readAsDataURL(e.target.files[0]||event.dataTransfers.files[0]);
   fileReader.onload=(e)=>{
 this.form.image = e.target.result;
 this.upImage=true;
 }

}
 else{
  Toast.fire({
  icon: 'error',
  title: 'Select only jpg,png,jpeg format image'
})
 }
}




               
  }


}




</script>

<style>

</style>