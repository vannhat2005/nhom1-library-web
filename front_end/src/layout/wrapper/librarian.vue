<template>
  <div class="layout">
    <SidebarLibrarian />
    <div class="content">
      <router-view />
    </div>
  </div>
</template>

<script>
import SidebarLibrarian from "../components/SidebarLibrarian.vue";

export default {
  name: "LibrarianLayout",
  components: { SidebarLibrarian },
};
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
