<template>
    <div class="text-center sm:w-[250px] h-[350px] w-[300px] sm:p-0  shadow shadow-sm">
        <Link :href="route('product.show', product.slug)"
        class="block w-full h-[calc(100%-32px)]">
            <img class="w-full sm:w-auto h-[100%] object-cover"
                 :src="product.preview?.url_preview" :alt="product.title"/>
        </Link>
        <div class="flex justify-between items-center p-1 h-auto">
            <p class="font-medium text-sm">
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
    setup(props) {
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
