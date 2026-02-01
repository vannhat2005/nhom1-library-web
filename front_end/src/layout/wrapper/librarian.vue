<template>
    <div>
        <SidebarLibrarian></SidebarLibrarian>
        <router-view></router-view>
    </div>
</template>

<script>
import SidebarLibrarian from '../components/SidebarLibrarian.vue';

export default {
    name: 'LibrarianLayout',
    components: {
        SidebarLibrarian, 
    }
}
</script>
<style>
    
</style>