
<template>
<Ukraine/>
    <slot class="w-full"/>
</template>

<script>
import {defineComponent} from 'vue'
import Ukraine from "@/Components/Ukraine.vue";

export default defineComponent({
    name: "MainLayout",
    components: {Ukraine}
})
</script>

<style scoped>

</style>
