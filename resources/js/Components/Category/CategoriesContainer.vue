<template>
    <div class="flex items-center justify-center h-[600px] container mx-auto gap-x-4">
          <BlockMd  :image="'https://placehold.co/380x560'"
          :text="'Сумки'"/>
          <BlockMd  :image="'https://placehold.co/380x560'"
          :text="'Окуляри'"/>
          <BlockMd  :image="'https://placehold.co/380x560'"
          :text="'Ремні'"/>
    </div>
</template>


<script>
import {defineComponent} from 'vue'
import BlockMd from "@/Components/Category/BlockMd.vue";

export default defineComponent({
    name: "CategoriesBlock",
    components: {BlockMd}
})
</script>

<style scoped>

</style>
