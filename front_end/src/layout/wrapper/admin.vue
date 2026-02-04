<template>
    <div class="admin-layout">
        <!-- Left -->
        <SidebarAdmin />
        <!-- Right -->
        <div class="main">
            <TopAdmin />
            <div class="content">
                <router-view />
            </div>
        </div>
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
<style scoped>
.admin-layout {
  display: flex;
  min-height: 100vh;
  background: #f7f8fb; /* giống nền ảnh */
}

.main {
  flex: 1;
  display: flex;
  flex-direction: column;
}

.content {
  padding: 18px;
}
</style>