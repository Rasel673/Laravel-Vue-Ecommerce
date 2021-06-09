<template>
<div>
         <!-- slider-section-start -->
       <div class="main-slider-one main-slider-two slider-area">
        <div id="wrapper" class="container" style="padding-top:1% !important">
        <div class="row">

            <div class="slider-wrapper col-md-9">

    <carousel :perPage="1" :autoplay="true" :paginationColor="'#fe5858'">
  <slide v-for="(slider,index) in sliders" :key="index">
    <img  :src="'Slider_photo/'+slider.image" alt="main slider" title="#htmlcaption"/>
    <div id="htmlcaption" class="nivo-html-caption slider-caption">
                    <div class="container">
                        <div class="slider-left slider-right">
                            <div class="slide-text animated zoomInUp">
                                <h3>new collection</h3>
                                <h1>Men’s Fashion 2016</h1>
                            </div>
                            <div class="animated slider-btn fadeInUpBig">
                                <a class="shop-btn" href="shop.html">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
  </slide>
</carousel>
                <!-- <div id="mainSlider" class="nivoSlider">


                    <carousel>
  <slide v-for="(slider,index) in sliders" :key="index">
    <img  :src="'Slider_photo'+slider.image" alt="main slider" title="#htmlcaption"/>
  </slide>
</carousel>
<div v-for="(slider,index) in sliders" :key="index">
     <img  :src="'Slider_photo'+slider.image" alt="main slider" title="#htmlcaption"/>
                  
</div>
                   
                </div>
                <div id="htmlcaption" class="nivo-html-caption slider-caption">
                    <div class="container">
                        <div class="slider-left slider-right">
                            <div class="slide-text animated zoomInUp">
                                <h3>new collection</h3>
                                <h1>Men’s Fashion 2016</h1>
                            </div>
                            <div class="animated slider-btn fadeInUpBig">
                                <a class="shop-btn" href="shop.html">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="htmlcaption2" class="nivo-html-caption slider-caption">
                    <div class="container">
                        <div class="slider-left two-caption-text slider-right">
                            <div class="slide-text animated zoomInUp">
                                <h3>new collection</h3>
                                <h1>Men’s Fashion 2016</h1>
                                <span>Starting at $65.00. Don’t miss out!</span>
                            </div>
                            <div class="one-p animated bounceInLeft">
                                <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum".</p>
                            </div>
                            <div class="animated slider-btn fadeInUpBig">
                                <a class="shop-btn" href="shop.html">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div> -->
                
            </div>

            <!-- categories show section start here -->
            <div class="col-md-3">
                <div class="list-group categories">
                    <label class="list-group-item list-group-item-action" aria-current="true">
                    <h4><i class="fa fa-bars" aria-hidden="true"></i> Categories</h4></label>         
                    <button type="button" class="list-group-item list-group-item-action" aria-current="true" v-for="category in categories" :key="category.id">
                      <router-link :to="`/shop/${category.id}`"><b>{{category.name}}</b><i class="fa fa-chevron-right" aria-hidden="true"></i></router-link></button>

                    
                  </div>
            </div>
        </div>							
        </div>
    </div>
    <!-- slider section end -->
</div>
</template>

<script>
import { Carousel, Slide } from 'vue-carousel';
export default {
data(){
    return{
     categories:[],
     sliders:[]
    }
},
 components: {
    Carousel,
    Slide
  },
mounted(){
// this.$store.dispatch('allCategory');
this.getCategory();
this.getSlider();
 },
//  computed:{
// categories(){
//     return this.$store.getters.categories;
// }
//  },
 methods:{
     ///get  all category information--------------
    getCategory(){
      axios.get('/index').then((response)=>{
       this.categories=response.data.categories.data;
      }).catch((error)=>{

      });
    },
    getSlider(){
        axios.get('/index').then((response)=>{
       this.sliders=response.data.sliders;
      }).catch((error)=>{

      });
    }
 }
}
</script>

