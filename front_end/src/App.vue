<template>
  <component :is="layout">
    <router-view />
  </component>
</template>


<script>

import ClientLayout from './layout/wrapper/client.vue';
import AdminLayout from './layout/wrapper/admin.vue';
import LibrarianLayout from './layout/wrapper/librarian.vue';


export default {
  name : 'App',
  computed: {
    layout() {
      const layout = this.$route.meta.layout;
      if(layout === 'admin') {
        return AdminLayout;
      } else if(layout === 'librarian') {
        return LibrarianLayout;
      } else {
        return ClientLayout;
      }
      
    }
  }
}
</script>
<style>
  
</style>