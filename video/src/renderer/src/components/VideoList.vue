<script setup lang="ts">
import VideoItem from './VideoItem.vue'
import useConfigStore from '@renderer/store/useConfigStore'
const { config } = useConfigStore()
</script>

<template>
  <main class="overflow-y-auto h-80">
    <video-item
      v-for="(video, index) of config.files"
      :key="index"
      :video="video"
      :index="index"
      v-if="config.files.length"
    />
    <div class="text-xs opacity-80 text-slate-600 text-center" v-else>暂无压缩视频</div>
  </main>
</template>
