<template>
    <div class="flex flex-col xl:flex-row flex-wrap mx-2 sm:mx-20 md:mx-2 max-h-[618px] mb-10 md:my-10">
        <ul class="w-full md:w-[130px] flex flex-row md:flex-col">
            <li
                v-for="(m, id) in media"
                :key="id"
                @click="activateMedia(m)"
                :class="{ 'active-media': m === activeMedia }"
                class="m-1 cursor-pointer rounded-sm overflow-hidden"
            >
                <img :src="m.url_preview" alt="...">
            </li>
        </ul>
        <div class="p-1 flex flex-1  h-[100%] md:max-w-[448px] w-full overflow-hidden">
            <img
                v-if="activeMedia.type === 1"
                :src="activeMedia.url_original"
                alt="..."
                class="h-[100%] object-cover md:object-contain w-full md:w-auto"
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

