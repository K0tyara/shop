<template>
    <div class="flex items-center justify-center h-[300px] p-2 sm:p-0 sm:h-[600px] container mx-auto gap-x-2 sm:gap-x-4
                   ">
        <BlockMd :image="'https://placehold.co/380x560'"
                 :text="'Сумки'"/>
        <BlockMd :image="'https://placehold.co/380x560'"
                 :text="'Окуляри'"/>
        <BlockMd :image="'https://placehold.co/380x560'"
                 :text="'Ремні'"/>
    </div>
</template>


<script>
import {defineComponent} from 'vue'
import BlockMd from "@/Components/Category/BlockMd.vue";
import {Link} from "@inertiajs/vue3";

export default defineComponent({
    name: "CategoriesBlock",
    components: {
        BlockMd,
        Link,
    }
})
</script>

<style scoped>

</style>
