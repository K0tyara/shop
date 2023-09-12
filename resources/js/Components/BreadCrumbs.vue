<template>
    <div class="flex flex-row gap-x-3 text-xs text-gray-600">
        <Link :href="'/'">
            <p class="text-md">Home</p>
        </Link>
        <template v-if="category.title">
            <p> / </p>
            <Link :href="route('product.index',{
                category: category.name,
            })">
                <p>{{ category.title }}</p>
            </Link>
        </template>
        <template v-if="subcategory.title">
            <p> / </p>
            <Link :href="route('product.index',{
                subcategory: subcategory.name,
            })">
                <p>{{ subcategory.title }}</p>
            </Link>
        </template>

        <template v-if="product">
            <p> / </p>
            <p>
                {{ product }}
            </p>
        </template>
    </div>
</template>

<script>
import {defineComponent} from 'vue'
import {Link} from "@inertiajs/vue3";

export default defineComponent({
    name: "BreadCrumbs",
    components: {
        Link,
    },
    props: {
        category: Object,
        subcategory: Object,
        product: String,
    },
    setup(props) {
    }
})
</script>

<style scoped>

</style>
