<template>
    <MainLayout>
        <Head>
            <title>Index</title>
        </Head>
        <CategoriesContainer/>
        <LastProductContainer class="my-10"/>
        <div class="container mx-auto flex justify-center my-10">
            <DarkBoxButton :is-uppercase="true"
                           :content="'Show all products'"/>
        </div>
        <Footer/>
    </MainLayout>
</template>


<script>
import {defineComponent} from 'vue'
import MainLayout from "@/Layouts/MainLayout.vue";
import Head from "@/Components/Head.vue";
import CategoriesContainer from "@/Components/Category/CategoriesContainer.vue";
import LastProductContainer from "@/Components/Product/LastProductContainer.vue";
import DarkBoxButton from "@/Components/Buttons/DarkBoxButton.vue";
import Footer from "@/Components/Footer.vue";

export default defineComponent({
    name: "Main",
    components: {
        Footer, DarkBoxButton,
        LastProductContainer, CategoriesContainer,
        Head, MainLayout
    }
})
</script>

<style scoped>

</style>
