<template>
<div>
<slider></slider>
<product></product>
</div>
</template>

 <script>
 import slide from '../partial/slider.vue';
 import Product from '../product/product.vue';
export default{
    name:"Home",
    data(){
        return{

        }
    },
    components:{
        'slider':slide,
        'product':Product
        
    },
}
</script>