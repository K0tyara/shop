<template>
    <Link class="flex-1 bg-center max-w-[360px] sm:w-full h-[100%] bg-no-repeat object-contain
            flex justify-center items-center"
          :href="route('product.index', {
              category: 'bags',
          })"
          :style="{ backgroundImage: 'url(' + image + ')' }">

        <p class="uppercase font-bold text-[25px] text-white">
            {{ text }}
        </p>
    </Link>
</template>

<script>
import {defineComponent} from 'vue'
import {Link} from "@inertiajs/vue3";

export default defineComponent({
    name: "BlockMd",
    components: {
        Link,
    },
    props: {
        text: String,
        image: String,
    }
})
</script>


<style scoped>

</style>
