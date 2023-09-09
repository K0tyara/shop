<template>
      <a class="flex-1 bg-center max-w-[360px] sm:w-full h-[100%] bg-no-repeat object-contain
            flex justify-center items-center"
         :style="{ backgroundImage: 'url(' + image + ')' }">
          <p class="uppercase font-bold text-[25px] text-white">
              {{text}}
          </p>
      </a>
</template>

<script>
import {defineComponent} from 'vue'

export default defineComponent({
    name: "BlockMd",
    props: {
        text: String,
        image: String,
    }
})
</script>


<style scoped>

</style>
