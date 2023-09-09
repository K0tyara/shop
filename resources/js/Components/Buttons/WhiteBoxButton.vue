<template>
    <button class="bg-white my-5 px-8 py-4"
            :class="{'uppercase': isUppercase}">
    {{ content}}
    </button>
</template>

<script>
import {defineComponent} from 'vue'

export default defineComponent({
    name: "WhiteBoxButton",
    props: {
        content: String,
        isUppercase: {
            type: Boolean,
            default: false,
        }
    }
})
</script>

<style scoped>

</style>
