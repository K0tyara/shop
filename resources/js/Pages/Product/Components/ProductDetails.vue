<template>
    <div class="flex items-center flex-1">
        <div class="w-3/4 sm:w-2/3 mx-auto">
            <p class="font-bold text-xs text-gray-400">#{{ product.article }}</p>
            <h1 class="text-4xl font-extrabold dark:text-white">{{ product.title }}</h1>
            <p class="font-bold text-xs text-gray-400">{{ product.price }}</p>

            <p class="my-6 text-lg font-normal text-gray-500 dark:text-gray-400 whitespace-wrap">
                {{ product.description }}
            </p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        product: Object,
    },
};
</script>
