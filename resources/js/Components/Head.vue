<template>
    <div class="bg-[url('https://placehold.co/1900x700')] bg-no-repeat bg-center w-full bg-cover h-[600px]
        flex flex-col justify-end relative">
        <div class="flex flex-col items-start gap-y-10
                   absolute bottom-[10%]  left-[5%]">
            <p class="text-white font-bold uppercase text-[40px]">
                Lorem ipsum dolor.
            </p>
            <WhiteBoxButton :content="'Shop now'"
                            :is-uppercase="true"/>
        </div>
    </div>
</template>

<script>
import {defineComponent} from 'vue'
import WhiteBoxButton from "@/Components/Buttons/WhiteBoxButton.vue";

export default defineComponent({
    name: "Head",
    components: {WhiteBoxButton}
})
</script>

<style scoped>

</style>
