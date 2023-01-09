<template>

        <div>Index</div>
        <Link href="/hello">Show Page</Link>
        <h2>{{ message }}</h2>
        <p>{{ text }}</p>

       <button> <Link href="/listing">All listings</Link></button> 
       <button> <Link href="/listing/create">Create listings</Link></button>

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

button, link {
    
    color: white;
    background-color: green;
    display: inline-block;
    margin-right: 10px;
    border-radius: 10px;
    width: auto;
    padding: 5px 20px 5px 20px;
    border: none;
}

</style>