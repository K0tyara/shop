<template>
    <div class="text-center">
        <Link :href="route('product.show', product.slug)">
            <img :src="product.preview.url_preview" :alt="product.title"/>
        </Link>
        <div class="flex justify-between items-center p-1">
            <p>
                {{ shortTitle(product.title) }}
            </p>
            <p class="text-sm ">
                {{ product.price }}
            </p>
        </div>
    </div>
</template>

<script>
import {defineComponent} from 'vue'
import {Link} from "@inertiajs/vue3";

export default defineComponent({
    name: "ProductSm",
    components: {
        Link,
    },
    props: {
        product: Object,
    },
    methods: {
        shortTitle(str) {
            if (str.length > 20)
                str = str.substring(0, 22) + '..'

            return str;
        }
    }
})
</script>

<style scoped>

</style>
