<template>
    <div>
        <SidebarAdmin></SidebarAdmin>
        <TopAdmin></TopAdmin>
        <router-view></router-view>
    </div>
</template>

<script>
import SidebarAdmin from '../components/SidebarAdmin.vue';
import TopAdmin from '../components/TopAdmin.vue';
export default {
    name: 'AdminLayout',
    components: {
        SidebarAdmin,
        TopAdmin
    }   
}
</script>
<style>
    
</style>