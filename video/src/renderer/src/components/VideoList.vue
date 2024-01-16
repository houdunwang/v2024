<script setup lang="ts">
import { ref } from 'vue'
import VideoItem from './VideoItem.vue'

const videos = ref([
  '看其他网站源码有助于新手学习，同时有些 HTML 是后台脚本如 PHP 渲染出来的，通过查看源码可以帮助我们分析问题。',
  '源码有助于新手学习，同时有些 HTML 是后台脚本如 PHP 渲'
])
</script>

<template>
  <main class="overflow-y-auto h-80">
    <video-item v-for="(video, index) of videos" :key="index" :video="{ title: video }" />
  </main>
</template>
