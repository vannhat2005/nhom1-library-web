<template>
    <div class="layout">
        <SidebarClient />
        <div class="content">
            <router-view />
        </div>
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
<style scoped>

.layout {
    display: flex;
    min-height: 100vh;
}

.content {
    flex: 1;
    padding: 24px;
    background: #f7f8fa;
}
</style>
