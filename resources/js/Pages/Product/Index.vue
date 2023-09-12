<template>
    <Ukraine/>
    <div class="flex flex-col justify-center  my-4 group">
        <ApplicationLogo class="self-center"/>
        <div class="border-b-[1px] border-b-gray-300 flex ">
            <CategoriesRowContainer class="mt-6"/>
        </div>
        <div class="flex relative pt-[20px]">
            <BreadCrumbs :category="{
                        name: category,
                        title:category,
                    }" :subcategory="{
                        name:subcategory,
                        title:subcategory,
                    }"
                         class="absolute left-[50%] translate-x-[-50%] top-2"/>
            <slot/>
        </div>
    </div>
    <Footer/>
</template>


<script>
import {defineComponent} from 'vue'
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Ukraine from "@/Components/Ukraine.vue";
import CategoriesRowContainer from "@/Components/Category/CategoriesRowContainer.vue";
import CategoriesLeftContainer from "@/Components/Category/CategoriesLeftContainer.vue";
import BreadCrumbs from "@/Components/BreadCrumbs.vue";
import ProductSm from "@/Components/Product/ProductSm.vue";
import Footer from "@/Components/Footer.vue";

export default defineComponent({
    name: "Index",
    components: {
        Footer,
        ProductSm, BreadCrumbs, CategoriesLeftContainer, CategoriesRowContainer, Ukraine, ApplicationLogo
    },
    props: {
        category: String,
        subcategory: String,
    },
    setup() {

    }

})
</script>

<style scoped>
</style>
