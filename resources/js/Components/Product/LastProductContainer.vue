<template>
    <div class="container mx-auto flex justify-center gap-x-10">
        <ProductSm v-for="(p, id) in products" :product="p"/>
    </div>
</template>

<script>
import {defineComponent, onMounted, ref} from 'vue'
import ProductSm from "@/Components/Product/ProductSm.vue";
import {shopStore} from "@/Stores/shopStore.js";


export default defineComponent({
    name: "LastProductContainer",
    components: {
        ProductSm
    },
    setup(){
        const store = shopStore();
        const products = ref([]);
        onMounted(async () => {
            await store.loadLastProducts();
            products.value = store.lastProducts;
        })

        return {
            products,
        }
    }
})
</script>

<style scoped>

</style>
