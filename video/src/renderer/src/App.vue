<script setup lang="ts">
import Navbar from '@renderer/components/Navbar.vue'
import Copyright from '@renderer/components/Copyright.vue'
const compress = () => {
  window.api.compress({
    file: '/Users/hd/live/v2024/video/hd.mp4',
    fps: 30,
    size: '1920x1080'
  })
}
</script>

<template>
  <main class="">
    <Navbar />
    <RouterView />
    <el-button type="primary" size="default" @click="compress">开始压缩</el-button>

    <Copyright class="mt-2" />
  </main>
</template>
