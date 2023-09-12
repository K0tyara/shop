<template>
    <div class="flex gap-x-10 mx-auto">
        <MdNavLink v-for="(category,id) in categories"
                   href="#">{{category.name}}</MdNavLink>
    </div>
</template>


<script>
import {defineComponent, onMounted, ref} from 'vue'
import NavLink from "@/Components/NavLink.vue";
import MdNavLink from "@/Components/MdNavLink.vue";
import {string} from "postcss-selector-parser";
import {shopStore} from "@/Stores/shopStore.js";

export default defineComponent({
    name: "CategoriesRowContainer",
    methods: {string},
    components: {MdNavLink, NavLink},
    setup(){
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
