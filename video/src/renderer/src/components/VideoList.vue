<script setup lang="ts">
import { CloseOne } from '@icon-park/vue-next'

import { ref } from 'vue'

const videos = ref([1, 3, 4, 5, 6, 7, 78, 8, 9, 9, 54, 56, 6, 78, 8, 89, 9, 9, 9, 0, 0, 34])
</script>

<template>
  <main class="overflow-y-auto h-80">
    <section v-for="(video, index) of videos" :key="index" class="video">
      {{ video }}
      <div class="icon">
        <close-one theme="outline" size="12" />
      </div>
    </section>
  </main>
</template>

<style lang="scss">
.video {
  @apply bg-white px-3 py-1 rounded-lg mb-2 mx-3 text-xs text-slate-600
  flex justify-between items-center;
  .icon {
    @apply text-slate-500 opacity-50 hover:scale-125 duration-300 hover:text-yellow-500 hover:opacity-90 cursor-pointer;
  }
}
</style>
