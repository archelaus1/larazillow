<template>
    <header class="border-b bordeer-gray-200 dark:border-gray-700 dark:bg-gray-800 bg-white w-full">
        <div class="container mx-auto">
            <nav class="p-4 flex items-center justify-between">
                <div class="text-lg font-medium">
                    <Link :href="route('listing.index')">Listings</Link>
                </div>
                <div class="text-xl text-emerald-500 dark:text-indigo-300 font-bold text-center">
                    <Link :href="route('listing.index')">LaraZillow</Link>
                </div>
                <div>
                    <Link :href="route('listing.create')" class="btn-primary">+ New Listing </Link>

                </div>

            </nav>
        </div>
    </header>

    <main class="container mx-auto p-4">
        <div v-if="flashSuccess" class="mb-4 border rounded-md shadow-sm border-green-200 dark:green-800 bg-emerald-100 dark:bg-emerald-800 text-sm p-2">
        {{ flashSuccess }}
   
    </div>
    <slot>Default</slot>
    </main>
   
   
   
    
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
