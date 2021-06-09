<template>
<div>
<slider></slider>
<product></product>
</div>
</template>

 <script>
 import slider from '../partial/slider.vue';
 import Product from '../product/product.vue';
export default{
    data(){
        return{

        }
    },
    components:{
        'slider':slider,
        'product':Product
        
    },
}
</script>