<template>

    <MainLayout>
        <div>Index</div>
        <Link href="/hello">Show Page</Link>
        <h2>{{ message }}</h2>
    </MainLayout>

</template>

<script setup>
    import {Link} from '@inertiajs/inertia-vue3'
    import MainLayout from '../../Layouts/MainLayout.vue'
    defineProps({
        message: String
    })
</script>

<style>
h2 {
    color: green;
    font-weight:bolder;
}
</style>