<script setup lang="ts">
import Navbar from '@renderer/components/Navbar.vue'
import Copyright from '@renderer/components/Copyright.vue'
</script>

<template>
  <main class="">
    <Navbar />
    <RouterView />
    <Copyright class="mt-2" />
  </main>
</template>
