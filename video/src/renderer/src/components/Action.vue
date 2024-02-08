<script setup lang="ts">
import { Plus, UpdateRotation } from '@icon-park/vue-next'
import useCompress from '@renderer/composables/useCompress'
import useVideo from '@renderer/composables/useVideo'
const { addFile } = useVideo()
const { run, isRun, progressNotice } = useCompress()
progressNotice()
</script>

<template>
  <main>
    <section class="flex justify-center gap-2">
      <div class="button">
        <el-upload
          action="#"
          :http-request="addFile"
          multiple
          drag
          :show-file-list="false"
          class="flex items-center"
          accept="video/*"
        >
          <plus theme="outline" size="42" />
        </el-upload>
      </div>
      <div class="button" @click="run">
        <update-rotation theme="outline" size="42" :class="{ isRun: isRun }" />
      </div>
    </section>
  </main>
</template>

<style lang="scss" scoped>
.isRun {
  @apply animate-spin text-slate-300 cursor-wait;
}
.button {
  @apply w-20 h-20 rounded-lg bg-white flex justify-center items-center text-slate-600;
}

:deep(.el-upload-dragger) {
  padding: 0 !important;
  border: none !important;
}
</style>
