<template>
    <div class="flex flex-col xl:flex-row flex-wrap mx-2 sm:mx-20 md:mx-2 h-[728px] mb-10 md:my-10">
        <ul class="w-full md:w-[130px] flex flex-row md:flex-col">
            <li
                v-for="(m, id) in media"
                :key="id"
                @click="activateMedia(m)"
                :class="{ 'active-media': m === activeMedia }"
                class="block m-1 cursor-pointer rounded-sm overflow-hidden sm:w-[120px] max-h-[146px]"
            >
                <img class="w-full h-[100%] object-cover" :src="m.url_preview" alt="...">
            </li>
        </ul>
        <div class="my-1 flex flex-1 md:max-w-[498px] w-full sm:h-auto overflow-hidden bg-gray-100">
            <img
                v-if="activeMedia.type === 1"
                :src="activeMedia.url_original"
                alt="..."
                class="h-[100%] object-cover w-full md:w-auto"
            />
            <div v-else-if="activeMedia.type === 0" class="bg-gray-500 h-[100%] w-full sm:w-auto flex justify-center">
                <video controls="controls">
                    <source :src="activeMedia.url_original">
                </video>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    props: {
        media: Array,
        activeMedia: Object,
    },
    methods: {
        activateMedia(media) {
            this.$emit('activateMedia', media);
        },
    },
};
</script>

<style scoped>
.active-media {
    border: 1px solid #6e6e6e;
}
</style>

