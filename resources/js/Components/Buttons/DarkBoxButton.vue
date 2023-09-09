<template>
    <button class="bg-gray-900 my-5 px-8 py-4"
            :class="{'uppercase': isUppercase}">
        <p class="text-white">
            {{ content }}
        </p>
    </button>
</template>

<script>
import {defineComponent} from 'vue'

export default defineComponent({
    name: "DarkBoxButton",
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
