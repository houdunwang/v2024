<script setup lang="ts">
import { CloseOne } from '@icon-park/vue-next'
import { VideoType } from '@renderer/types'
import { ref } from 'vue'

const { video } = defineProps<{ video: VideoType }>()
const process = ref(2)
</script>

<template>
  <section class="video" :style="`--process:${process}%`">
    <div class="title z-10">{{ video.title }}</div>
    <div class="icon">
      <close-one theme="outline" size="12" />
    </div>
  </section>
</template>

<style lang="scss" scoped>
.video {
  @apply bg-white px-3 py-[8px] rounded-lg mb-2 mx-3 text-xs text-slate-600
  flex justify-between items-center relative;
  &::before {
    content: '';
    @apply bg-yellow-300 absolute top-0 bottom-0 left-0 right-0 z-0 rounded-lg;
    width: var(--process);
  }
  .title {
    @apply truncate;
  }
  .icon {
    @apply text-slate-500 opacity-50 hover:scale-125 duration-300 hover:text-yellow-500 hover:opacity-90 cursor-pointer;
  }
}
</style>
