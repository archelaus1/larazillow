<template>
    <Link href="/">Index Page</Link>&nbsp;
    <Link href="/hello">Show Page</Link>

    <div>The elapsed time is {{ timer }}</div>
   
    <slot>Default</slot>
</template>

<script setup>
    import { Link } from '@inertiajs/inertia-vue3'
    import { ref } from 'vue'

    const timer = ref(1)
    setInterval(()=> timer.value++, 1000)

</script>
