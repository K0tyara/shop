<template>
    <Main :category="product.category" :subcategory="product.subcategory">
        <div class="container mx-auto my-10 flex-col flex flex-wrap xl:flex-row">
            <MediaList :media="media" @activateMedia="activateMedia" :activeMedia="activeMedia"/>
            <ProductDetails :product="product"/>
            <hr class="h-1 w-full mt-4"/>
            <p class="mx-auto mb-3">Last products</p>
            <LastProductContainer/>
        </div>
    </Main>
</template>

<script>
import {defineComponent, ref} from 'vue';
import Main from '@/Pages/Product/Index.vue';
import MediaList from '../Components/MediaList.vue'
import ProductDetails from '../Components/ProductDetails.vue';
import LastProductContainer from "@/Components/Product/LastProductContainer.vue";

export default defineComponent({
    name: 'Show',
    components: {
        LastProductContainer,
        Main,
        MediaList,
        ProductDetails,
    },
    props: {
        product: Object,
    },
    setup(props) {
        const media = ref(props.product.media);
        const activeMedia = ref(media.value[0]);

        const activateMedia = (selectedMedia) => {
            activeMedia.value = selectedMedia;
        };

        return {
            media,
            activeMedia,
            activateMedia,
        };
    },
});
</script>

<style scoped>
.active-media {
    border: 1px solid #6e6e6e;
}
</style>
