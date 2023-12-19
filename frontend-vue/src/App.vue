<script setup>
  import HelloWorld from './components/Home.vue';
  import Sidebar from './components/Sidebar.vue';
</script>

<template>
      <Sidebar />
      <main class="p-4 sm:ml-64">
        <RouterView />
      </main>
</template>

<style scoped>


</style>
