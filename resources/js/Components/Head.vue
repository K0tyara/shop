<template>
    <div class="bg-[url('https://krasavica.info/uploads/posts/2022-05/1653874226_9-krasavica-info-p-podium-dlya-pokaza-mod-devushka-krasivo-fo-12.jpg')]
      bg-no-repeat  w-full bg-cover h-[300px] sm:h-[600px] cover
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
    bottom: 0;
    right: 0;
    width: 100%;
    height: 100%;
    z-index: 0; /* Розміщуємо псевдоелемент позаду контенту */
    opacity: 0.6; /* Затемнення картинки (змініть за потребою) */
}
</style>
