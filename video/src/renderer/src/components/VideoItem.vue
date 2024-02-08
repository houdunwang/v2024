<script setup lang="ts">
import { CloseOne } from '@icon-park/vue-next'
import useVideo from '@renderer/composables/useVideo'
import { VideoType } from '@renderer/types'

const { video } = defineProps<{ video: VideoType; index: number }>()
const { remove, bgColor } = useVideo()
</script>

<template>
  <section class="video" :style="`--process:${video.progress}%;--bgColor:${bgColor(video)}`">
    {{ bgColor(video) }}
    <div class="title z-10">{{ video.name }} --{{ video.progress }}-- {{ video.state }}</div>
    <div class="icon" @click="remove(index)">
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
    @apply absolute top-0 bottom-0 left-0 right-0 z-0 rounded-lg;
    width: var(--process);
    background-color: var(--bgColor);
  }
  .title {
    @apply truncate;
  }
  .icon {
    @apply text-slate-500 opacity-50 hover:scale-150 duration-300 hover:text-yellow-500 hover:opacity-100 cursor-pointer;
  }
}
</style>
