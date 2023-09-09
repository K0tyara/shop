<template>
    <div class="container mx-auto flex justify-center gap-x-10">
        <ProductSm :image="'https://placehold.co/228x300'"
        :title="'Lorem ipsum dolor sit amet.'"/>
        <ProductSm :image="'https://placehold.co/228x300'"
        :title="'Lorem ipsum dolor sit amet.'"/>
        <ProductSm :image="'https://placehold.co/228x300'"
        :title="'Lorem ipsum dolor sit amet.'"/>
        <ProductSm :image="'https://placehold.co/228x300'"
        :title="'Lorem ipsum dolor sit amet.'"/>
    </div>
</template>

<script>
import {defineComponent} from 'vue'
import ProductSm from "@/Components/Product/ProductSm.vue";

export default defineComponent({
    name: "LastProductContainer",
    components: {ProductSm}
})
</script>

<style scoped>

</style>
