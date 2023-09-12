<template>
    <div v-for="(category, id) in categories"
         class="my-4">
        <Link :href="route('product.index',{
            category: category.name,
        })" class="hover:underline block">
            <p class="font-medium text-md uppercase mb-2">{{ category.name }}</p>
        </Link>
        <div v-for="(sub, id) in category.subcategory"
             class="flex flex-col gap-y-2 ml-10 text-sm">
            <Link :href="route('product.index', {
                category:category.name,
                subcategory: sub.name,
            })" class="hover:underline">
                <p>{{ sub.name }}</p>
            </Link>
        </div>
    </div>
</template>


<script>
import {defineComponent, onMounted, ref} from 'vue'
import {Link} from "@inertiajs/vue3";
import {shopStore} from "@/Stores/shopStore.js";

export default defineComponent({
    name: "CategoriesLeftContainer",
    components: {
        Link,
    },
    setup() {
        const store = shopStore();
        const categories = ref([]);

        onMounted(async () => {
            await store.loadCategories();
            categories.value = store.categories;
        })

        return {
            categories
        }
    }
})
</script>

<style scoped>

</style>
