<template>
    <div class="text-center">
        <a :href="url">
            <img :src="image" :alt="title"/>
        </a>
        <p>
            {{ title }}
        </p>
    </div>
</template>

<script>
import {defineComponent} from 'vue'

export default defineComponent({
    name: "BlockSm",
    props: {
        image: String,
        title: String,
        url: String,
    }
})
</script>

<style scoped>

</style>
