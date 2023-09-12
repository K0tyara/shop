<template>
    <Main :category="category"
          :subcategory="subcategory">
        <div class="w-1/6 pl-11 py-16">
            <CategoriesLeftContainer/>
        </div>
        <div class="flex-1">
            <div class=" px-8 py-3 ">
                <div class="flex flex-row flex-wrap gap-2">
                    <ProductSm v-for="(prod, id) in products"
                               :product="prod"
                               class="max-w-[250px]"/>
                </div>
            </div>
        </div>
    </Main>
</template>

<script>
import {defineComponent} from 'vue'
import CategoriesLeftContainer from "@/Components/Category/CategoriesLeftContainer.vue";
import ProductSm from "@/Components/Product/ProductSm.vue";
import Main from '@/Pages/Product/Index.vue'

export default defineComponent({
    name: "Index",
    components: {
        ProductSm,
        CategoriesLeftContainer,
        Main
    },
    props: {
        category: String,
        subcategory: String,
        products: Array,
    },
    setup() {

    }
})
</script>

<style scoped>

</style>
