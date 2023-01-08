<template>
    <div v-for="listing in listings" :key="listing.id">

        <Link :href="`listing/${listing.id}`">{{ listing.city }}</Link>
       
    </div>

</template>

<script setup>
import {Link} from '@inertiajs/inertia-vue3'
    defineProps({
        listings: Array,
    })
</script>