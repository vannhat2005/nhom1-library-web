<template>
    <div>
        <SidebarClient></SidebarClient>
        <router-view></router-view>
    </div>
</template>

<script>
import SidebarClient from '../components/SidebarClient.vue';

export default {
    name: 'ClientLayout',
    components: {
        SidebarClient, 
    }
}
</script>
<style>
    
</style>