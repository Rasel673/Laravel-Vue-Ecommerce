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
              <li class="breadcrumb-item"><a href="#">Slider</a></li>
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
                <h3 class="card-title">Update New Slider</h3>
                 <router-link to="/slider" class="btn btn-sm btn-danger float-right">Sliders</router-link>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" @submit.prevent="updateSlider" enctype="multipart/form-data"> 
                <div class="card-body">

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">title</label>
                    <div class="col-sm-10">
                      <input
                      type="text" 
                      class="form-control" 
                      id="inputEmail3" 
                      placeholder="Slider title"
                      :class="{ 'is-invalid': form.errors.has('title') }"
                      
                      v-model="form.title"
                      >
                      <has-error :form="form" field="title"></has-error>
                    </div>
                  </div>

                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Short description</label>
                    <div class="col-sm-10">
                      <textarea
                      type="text" 
                      class="form-control"
                      placeholder="Slider description"
                      :class="{ 'is-invalid': form.errors.has('description') }"
                      v-model="form.description"
                      ></textarea>
                      <has-error :form="form" field="description"></has-error>
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
                    <label for="inputEmail3" class="col-sm-2 col-form-label">New Image</label>
                    <div class="col-sm-4">
                      <input
                      type="file" 
                      id="inputEmail3" 
                      placeholder="Slider Image"
                      :class="{ 'is-invalid': form.errors.has('image') }"
                      
                      @change="imageUpload"
                      
                      >
                      <has-error :form="form" field="image"></has-error>
                    </div>
                  
                  
                    <div class="col-sm-6"  v-if="upImage">
                       <img :src="form.image" class="thumbnile" height="100" width="150"/>
                    </div>
                  </div>
                   <div class="form-group row" v-if="getOldImg">
                    <div class="col-sm-2"> <label for="inputEmail3" class="col-form-label">Old Image</label></div>
                    <div class="col-sm-10">
                       <img :src="'Slider_photo/'+oldImage" class="thumbnile" height="100" width="150"/>
                    </div>
                  </div>

                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">update</button>
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
 title:'',
 description:'',
 status:null,
 slug:'',
 image:'',
 imgStatus:''
}),
upImage:false,
oldImage:'',
getOldImg:true
}
},
mounted(){
this.getSlider();
},

methods:{
///get single Slider information--------------
    getSlider(){
      var slug=this.$route.params.slug;
       let vm=this;
      axios.get('sliders/'+slug+'/edit').then((response)=>{
       vm.form.fill(response.data);
       vm.form.imgStatus='';
       vm.oldImage=response.data.image;
      }).catch((error)=>{

      });
    },
  ///update Slider-----------------------------
 updateSlider(){
    var slug=this.$route.params.slug;
    let vm=this;
this.form.put('sliders/'+slug).then((response)=>{
  if(response.status==200){
  Toast.fire({
  icon: 'success',
  title: 'Slider save successfully'
})
this.getOldImg=false;
}

}).catch((error)=>{
  Toast.fire({
  icon: 'error',
  title: 'Operation failed'
})
})
  },

  ///form reset------------------------------------------
 reset(){
    this.form.reset();
   this.upImage=false;
  },
///image validation and image viewer-----------------------------
  imageUpload(e){
    let file=e.target.files[0];
    if(file.type=='image/png'|| file.type=='image/jpg' || file.type=='image/jpeg'){
  var fileReader=new FileReader();
  fileReader.readAsDataURL(e.target.files[0]||event.dataTransfers.files[0]);
   fileReader.onload=(e)=>{
 this.form.image = e.target.result;
 this.form.imgStatus=1;
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