<template>
    <Link href="/">Index Page</Link>&nbsp
    <Link href="/hello">Show Page</Link>

    The elapsed time is {{ timer }}
    <slot>Default</slot>

</template>

<script setup>
    import {Link} from '@inertiajs/inertia-vue3'
    import {ref} from 'vue'

    // let value = '2'

    const timer = ref(value, 1)

</script>
