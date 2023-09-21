<template>
    <Link class="flex-1 bg-center max-w-[360px] sm:w-full h-[100%] bg-no-repeat object-contain
            flex justify-center items-center cover"
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
.cover {
    position: relative;
    overflow: hidden;
}

.cover::before {
    content: "";
    background: black;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 0; /* Розміщуємо псевдоелемент позаду контенту */
    opacity: 0.6; /* Затемнення картинки (змініть за потребою) */
}
</style>
