<template>
    <Link :href="'/'">
        <p class="text-[33px] uppercase font-bold text-gray-800">Shop</p>
    </Link>
</template>
<script >
import {Link} from "@inertiajs/vue3";

export default {
    name: 'AppLogo',
    components: {
        Link,
    }
}
</script>
