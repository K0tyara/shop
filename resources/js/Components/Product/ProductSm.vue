<template>
    <div class="text-center w-full sm:w-auto  px-2 py-1 sm:p-0">
        <Link :href="route('product.show', product.slug)">
            <img class="w-full sm:w-auto"
                 :src="product.preview.url_preview" :alt="product.title"/>
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
