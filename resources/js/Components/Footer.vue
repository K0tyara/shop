<template>
    <div class="w-full flex gap-x-16 mt-14 bg-gray-100 py-8 px-4">
        <div class="text-left w-1/2 px-8 py-3">
            <p class="font-bold uppercase mb-10">
                Lorem ipsum dolor sit amet. (about)
            </p>
            <p class="text-sm">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci commodi est
                expedita ipsam provident quaerat repellendus temporibus. Commodi cupiditate dicta
                repudiandae veniam voluptate! Adipisci at dolore doloribus eius id voluptate!
            </p>
        </div>
        <div class="w-1/2 px-8 py-3">
            <p class="font-bold uppercase mb-10">
                help
            </p>
            <div class="flex flex-col font-thin text-gray-600">
                <a href="#">
                    Lorem.
                </a>
                <a href="#">
                    Lorem ipsum dolor.
                </a>
                <a href="#">
                    Lorem ipsum.
                </a>
                <a href="#">
                    Lorem ipsum dolor sit amet.
                </a>

                <a href="#">
                    Lorem ipsum dolor sit.
                </a>

            </div>
        </div>
        <div class="w-full px-8 pt-3">
            <p class="font-bold uppercase mb-10">
                newsletter
            </p>
            <p>Subscribe to news</p>
            <input type="text" class="block">
            <DarkBoxButton :content="'Subscribe'"
                           :is-uppercase="true"/>
        </div>
    </div>
    <Copyright/>
</template>


<script>
import {defineComponent} from 'vue'
import DarkBoxButton from "@/Components/Buttons/DarkBoxButton.vue";
import Copyright from "@/Components/Copyright.vue";

export default defineComponent({
    name: "Footer",
    components: {Copyright, DarkBoxButton}
})
</script>

<style scoped>

</style>
