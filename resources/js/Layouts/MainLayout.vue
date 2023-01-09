<template>
    <Link href="/">Index Page</Link>&nbsp;
    <Link href="/hello">Show Page</Link>

    <!-- <div>The elapsed time is {{ timer }}</div> -->
    <div v-if="flashSuccess" class="success">
        {{ flashSuccess }}

    </div>
   
    <slot>Default</slot>
</template>

<script setup>
    import {computed} from 'vue'
    import { Link, usePage } from '@inertiajs/inertia-vue3'

    //page.props.value.flash.success
    const page = usePage()
    const flashSuccess = computed(
        ()=> page.props.value.flash.success, 
        )
    

</script>

<style scoped>

.success {
    color: white;
    background-color: green;
}
</style>
