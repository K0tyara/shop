<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? 'inline-flex items-center px-1 pt-1 border-b-2 border-gray-800  font-medium leading-5  focus:outline-none ' +
        'focus:border-indigo-700 transition duration-150 ease-in-out'
        : 'inline-flex items-center px-1 pb-2 border-b-[1px] border-transparent font-medium leading-5' +
        'hover:text-gray-700 hover:border-gray-600 focus:outline-none group-focus:border-gray-100 ' +
        'transition duration-150 ease-in-out'
);
</script>

<template>
    <Link :href="href" :class="classes" class="text-[15px] pb-4 font-bold text-gray-900 ">
        <slot />
    </Link>
</template>

<style>

</style>
