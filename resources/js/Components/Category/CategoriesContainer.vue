<template>
    <swiper
        class="h-[240px] p-2 sm:p-0 sm:h-[520px] my-3 gap-x-2 sm:gap-x-4"
        :slides-per-view="7"
        :looped-slides="5"
        :loop="false"
        @swiper="onSwiper"

        :centered-slides="false"
        :autoplay="{
              delay: 2500,

        }"
        :space-between="3"
        :modules="modules">
        <swiper-slide class="max-w-[360px] sm:w-full min-w-[120px] h-[calc(100%-40px)]">
            <BlockMd :image="'http://localhost/storage/media/product_media-54-1.jpg'"
                     :text="'first'"
                     :category="'bags'"
            />
        </swiper-slide>
        <swiper-slide class="max-w-[360px] sm:w-full min-w-[120px] h-[calc(100%-40px)]">
            <BlockMd :image="'https://images.shafastatic.net/1003692527'"
                     :text="'Окуляри'"
                     :category="'glasses'"/>
        </swiper-slide>
        <swiper-slide class="max-w-[360px] sm:w-full min-w-[120px] h-[calc(100%-40px)]">
            <BlockMd
                :image="'https://luxbags.com.ua/wp-content/uploads/2021/03/ZHenskie-Kozhanyj-remen-CHRISTIAN-DIOR-4.jpg?v=1614849134'"
                :text="'Ремні'"
                :category="'straps'"/>
        </swiper-slide>
        <swiper-slide class="max-w-[360px] sm:w-full min-w-[120px] h-[calc(100%-40px)]">
            <BlockMd :image="'http://localhost/storage/media/product_media-54-1.jpg'"
                     :text="'Сумки'"
                     :category="'bags'"
            />
        </swiper-slide>
        <swiper-slide class="max-w-[360px] sm:w-full min-w-[120px] h-[calc(100%-40px)]">
            <BlockMd :image="'https://images.shafastatic.net/1003692527'"
                     :text="'Окуляри'"
                     :category="'glasses'"/>
        </swiper-slide>
        <swiper-slide class="max-w-[360px] sm:w-full min-w-[120px] h-[calc(100%-40px)]">
            <BlockMd
                :image="'https://luxbags.com.ua/wp-content/uploads/2021/03/ZHenskie-Kozhanyj-remen-CHRISTIAN-DIOR-4.jpg?v=1614849134'"
                :text="'Ремні'"
                :category="'straps'"/>
        </swiper-slide>
        <swiper-slide class="max-w-[360px] sm:w-full min-w-[120px] h-[calc(100%-40px)]">
            <BlockMd :image="'http://localhost/storage/media/product_media-54-1.jpg'"
                     :text="'Сумкиdd'"
                     :category="'bags'"
            />
        </swiper-slide>
        <swiper-slide class="max-w-[360px] sm:w-full min-w-[120px] h-[calc(100%-40px)]">
            <BlockMd :image="'https://images.shafastatic.net/1003692527'"
                     :text="'Окуляри'"
                     :category="'glasses'"/>
        </swiper-slide>
        <swiper-slide class="max-w-[360px] sm:w-full min-w-[120px] h-[calc(100%-40px)]">
            <BlockMd
                :image="'https://luxbags.com.ua/wp-content/uploads/2021/03/ZHenskie-Kozhanyj-remen-CHRISTIAN-DIOR-4.jpg?v=1614849134'"
                :text="'Ремні'"
                :category="'straps'"/>
        </swiper-slide>
        <swiper-slide class="max-w-[360px] sm:w-full min-w-[120px] h-[calc(100%-40px)]">
            <BlockMd :image="'http://localhost/storage/media/product_media-54-1.jpg'"
                     :text="'Сумкиdd'"
                     :category="'bags'"
            />
        </swiper-slide>
        <swiper-slide class="max-w-[360px] sm:w-full min-w-[120px] h-[calc(100%-40px)]">
            <BlockMd :image="'https://images.shafastatic.net/1003692527'"
                     :text="'Окуляри'"
                     :category="'glasses'"/>
        </swiper-slide>
        <swiper-slide class="max-w-[360px] sm:w-full min-w-[120px] h-[calc(100%-40px)]">
            <BlockMd
                :image="'https://luxbags.com.ua/wp-content/uploads/2021/03/ZHenskie-Kozhanyj-remen-CHRISTIAN-DIOR-4.jpg?v=1614849134'"
                :text="'Ремні'"
                :category="'straps'"/>
        </swiper-slide>
        <swiper-slide class="max-w-[360px] sm:w-full min-w-[120px] h-[calc(100%-40px)]">
            <BlockMd :image="'http://localhost/storage/media/product_media-54-1.jpg'"
                     :text="'Сумкиdd'"
                     :category="'bags'"
            />
        </swiper-slide>
        <swiper-slide class="max-w-[360px] sm:w-full min-w-[120px] h-[calc(100%-40px)]">
            <BlockMd :image="'https://images.shafastatic.net/1003692527'"
                     :text="'last'"
                     :category="'glasses'"/>
        </swiper-slide>

    </swiper>
    <!--        <div class="swiper-container">-->
    <!--            <div class="swiper-wrapper flex items-center  h-[240px] p-2 sm:p-0 sm:h-[520px] w-full gap-x-2 sm:gap-x-4">-->
    <!--                <BlockMd :image="'http://localhost/storage/media/product_media-54-1.jpg'"-->
    <!--                         :text="'Сумки'"-->
    <!--                         :category="'bags'"-->
    <!--                        />-->
    <!--                <BlockMd :image="'https://images.shafastatic.net/1003692527'"-->
    <!--                         :text="'Окуляри'"-->
    <!--                         :category="'glasses'"/>-->
    <!--                <BlockMd-->
    <!--                    :image="'https://luxbags.com.ua/wp-content/uploads/2021/03/ZHenskie-Kozhanyj-remen-CHRISTIAN-DIOR-4.jpg?v=1614849134'"-->
    <!--                    :text="'Ремні'"-->
    <!--                    :category="'straps'"/>-->
    <!--            </div>-->
    <!--        </div>-->
</template>


<script>
import {defineComponent, ref} from 'vue'
import BlockMd from "@/Components/Category/BlockMd.vue";
import {Link} from "@inertiajs/vue3";
import {Swiper, SwiperSlide,} from 'swiper/vue';
// Import Swiper styles
import 'swiper/css';
import 'swiper/css/autoplay';
import {Autoplay} from 'swiper/modules';

export default defineComponent({
    name: "CategoriesBlock",
    components: {
        BlockMd,
        Link,
        Swiper,
        SwiperSlide,
    },
    setup() {
        const swiper = ref(null)
        return {
            modules: [Autoplay],
        };
    },
    methods: {
        onSwiper(swiper) {
            this.swiper = swiper;
        },
        stopAutoplay() {
            console.log('stop')
            if (this.swiper) {
                this.swiper.loop = false;
                this.swiper.autoplay.stop();
            }
        },
        startAutoplay() {
            if (this.swiper) {
                this.swiper.loop = true;
                this.swiper.autoplay.start();
            }
        },
    }
})
</script>

<style scoped>

</style>
