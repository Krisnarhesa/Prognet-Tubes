<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios';

const user = ref();

onMounted( async () => {
  const data = await axios.get('http://127.0.0.1:8000/api/user')
})

defineProps({
  msg: String,
})

const count = ref(0)
</script>

<template>
  
  <h1>Anjayani</h1>
  <h1>Anjayani</h1>
  <h1>Anjayani</h1>
  <h1>Anjayani</h1>
  <h1>Anjayani</h1>
  <h1>Anjayani</h1>
  <h1>Anjayani</h1>
  <h1>Anjayani</h1>
  <h1>Anjayani</h1>
  <h1>Anjayani</h1>
  <h1>Anjayani</h1>
  <h1>Anjayani</h1>
  <h1>Anjayani</h1>
  <h1>Anjayani</h1>
    <h1>Anjayani</h1>

    <p>kok gak muncul apasu</p>

</template>

<style scoped>

</style>
