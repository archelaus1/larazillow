<template>

        <div>Index</div>
        <Link href="/hello">Show Page</Link>
        <h2>{{ message }}</h2>
        <p>{{ text }}</p>

        <Link href="/listing">All listings</Link>

</template>

<script setup>
    import {Link} from '@inertiajs/inertia-vue3'
    
    defineProps({
        message: String,
        text: String
    })
</script>


<style scoped>
h2 {
    color: green;
    font-weight:bolder;
}
</style>