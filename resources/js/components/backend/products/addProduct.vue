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
              <li class="breadcrumb-item"><a href="#">Product</a></li>
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
          <div class="col-md-10 offset-1">

            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add New Product</h3>
                 <router-link to="/products" class="btn btn-sm btn-danger float-right">Products</router-link>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" @submit.prevent="addProduct" enctype="multipart/form-data"> 
                <div class="card-body">

                  <div class="form-group row">
                   <div class="col-sm-4">
                       <label  class="col-form-label">Name</label>
                 
                      <input
                      type="text" 
                      class="form-control form-control-border border-width-2" 
                  
                      placeholder="Product Name"
                      :class="{ 'is-invalid': form.errors.has('product_name') }"
                      
                      v-model="form.product_name"
                      >
                      <has-error :form="form" field="product_name"></has-error>
                    </div>

                     <div class="col-sm-4">
                       <label  class="col-form-label">Price</label>
                 
                      <input
                      type="text" 
                      class="form-control form-control-border border-width-2" 
                  
                      placeholder="Product price"
                      :class="{ 'is-invalid': form.errors.has('product_price') }"
                      
                      v-model="form.product_price"
                      >
                      <has-error :form="form" field="product_price"></has-error>
                    </div>
                      <div class="col-sm-4">
                <label  class="col-form-label">Code</label>
                 
                      <input
                      type="text" 
                      class="form-control form-control-border border-width-2" 
                  
                      placeholder="Product Code"
                      :class="{ 'is-invalid': form.errors.has('product_code') }"
                      
                      v-model="form.product_code"
                      >
                      <has-error :form="form" field="product_code"></has-error>


                  </div>

                  </div>
                  


                  <div class="form-group row">
                   <div class="col-sm-6">
                       <label  class="col-form-label">Tags</label>
                      <input
                      type="text" 
                      class="form-control form-control-border border-width-2"  
                      placeholder="Product Tags"
                      :class="{ 'is-invalid': form.errors.has('product_tags') }"
                      
                      v-model="form.product_tags"
                      >
                      <has-error :form="form" field="product_tags"></has-error>
                    </div>
                    

                    <div class="col-sm-6">

                      <label  class="col-form-label">Quantity</label>
                 
                      <input
                      type="text" 
                      class="form-control form-control-border border-width-2"  
                      placeholder="Product Quantity"
                      :class="{ 'is-invalid': form.errors.has('product_qty') }"
                      
                      v-model="form.product_qty"
                      >
                      <has-error :form="form" field="product_qty"></has-error>
                    </div>
                  </div>
                  <div class="form-group row">
                   <div class="col-sm-6">
                       <label  class="col-form-label">Category</label>


                    <select class="custom-select form-control-border border-width-2"  :class="{ 'is-invalid': form.errors.has('categories_id') }" v-model="form.categories_id">
                    <option>------select category------</option>
                    <option v-for="category in categories" :key="category.id"  :value="category.id">{{category.name}}</option>
                  </select>
                 <has-error :form="form" field="categories_id"></has-error>
                    </div>

                    <div class="col-sm-6">

                      <label  class="col-form-label">Brand</label>
                 

                  <select class="custom-select form-control-border border-width-2"   :class="{ 'is-invalid': form.errors.has('brand_id') }"    v-model="form.brand_id">
                    <option>------select Brand--------</option>
                    <option v-for="brand in brands" :key="brand.id" :value="brand.id">{{brand.name}}</option>
 
                  </select>
                      <has-error :form="form" field="brand_id"></has-error>
                    </div>
                  </div>


                   <div class="form-group row">
                     <div class="col-sm-2">

                       <label for="checkboxPrimary3">
                          Product Color:
                        </label>
                     </div>
   
                    <div class="col-sm-4">
                      <div class="icheck-primary d-inline m-1" v-for="color in colors" :key="color.color_id">
                        <input type="checkbox"   class="primary p-2" :value="color.color_id" v-model="form.product_color">
                        <label for="checkboxPrimary1">
                          {{color.color_name}}
                        </label>
                      </div>
                 </div>
                 
                  <div class="col-sm-2">
                    <label  class="col-form-label">Product Size:</label>
                     </div>

                    <div class="col-sm-4">
                      <div class="icheck-primary d-inline m-1" v-for="size in sizes" :key="size.size_id">
                        <input type="checkbox"   class="primary p-2" :value="size.size_id" v-model="form.product_size">
                        <label for="checkboxPrimary1">
                          {{size.size_name}}
                        </label>
                      </div>
                 
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
                   <div class="col-sm-2">
                      <label  class="col-form-label">Product Description</label>
                   </div>
                   <div class="col-sm-10">
                       <ckeditor :editor="editor" v-model="form.product_description" :config="editorConfig"  :class="{ 'is-invalid': form.errors.has('product_description') }"></ckeditor>

                       <has-error :form="form" field="product_description"></has-error>
                   </div>
                 </div>
                

                   <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-4">
                      <input
                      type="file" 
                      placeholder="product Image"
                      :class="{ 'is-invalid': form.errors.has('product_photo') }"
                      
                      @change="imageUpload"
                      
                      >
                      <has-error :form="form" field="product_photo"></has-error>
                    </div>

                        <div class="col-sm-6" v-if="upImage">
                       <img :src="form.product_photo" class="thumbnile" height="100" width="150"/>
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
 import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
 import Option from '../../../helper.json';
export default {
data(){
  return{
    sizeOption:Option,

form: new Form({
 brand_id:null,
 categories_id:null,
 product_name:'',
 product_price:'',
 product_tags:'',
 product_description:'',
 product_code:'',
 product_qty:'',
 status:null,
 product_photo:'',
 product_size:[],
 product_color:[],
}),
upImage:false,
   editor: ClassicEditor,
    editorConfig: {},
    categories:[],
    brands:[],
    sizes:[],
    colors:[]
}
},
watch:{

},
mounted(){
this.category()
this.Brand()
this.Color()
this.Size()
},

methods:{
///fetch category---------------------------
category(){
axios.get('categories/create').then((response)=>{
  if(response.status=200){
this.categories=response.data;
  }
}).catch((error)=>{
  console.log(error.data);
});
},
///fetch brands---------------------------
Brand(){
axios.get('brands/create').then((response)=>{
  if(response.status=200){
this.brands=response.data;
  }
}).catch((error)=>{
  console.log(error.data);
});
},
///fetch product size--------------------
Size(){
  axios.get('sizes/create').then((response)=>{
this.sizes=response.data;
  }).catch((error)=>{
console.log("something went wrong")
  })
},
///fetch product color--------------------
Color(){
  axios.get('colors/create').then((response)=>{
this.colors=response.data;
  }).catch((error)=>{
 console.log("something went wrong") 
  })
},

  ///add product-----------------------------
 addProduct(){
this.form.post('/products').then((response)=>{
  if(response.status==200){
  Toast.fire({
  icon: 'success',
  title: 'product save successfully'
})
  this.reset();
  this.form.product_photo='';
}

}).catch((error)=>{
  Toast.fire({
  icon: 'error',
  title: 'Operation failed'
})
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
  fileReader.readAsDataURL(e.target.files[0]||e.dataTransfers.files[0]);
   fileReader.onload=(e)=>{
 this.form.product_photo = e.target.result;
 this.upImage=true;
 }

}
 else{
  Toast.fire({
  icon: 'error',
  title: 'Select only jpg,png,jpeg format image'
})
 }
},





               
  }


}




</script>

<style>

</style>