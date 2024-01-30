<script setup lang="ts">
import { Plus, UpdateRotation } from '@icon-park/vue-next'
import useCompress from '@renderer/composables/useCompress'
import useVideo from '@renderer/composables/useVideo'
const { addFile } = useVideo()
const { compress, video } = useCompress()
</script>

<template>
  <main>
    <section class="flex justify-center gap-2">
      <div class="button">
        <el-upload
          ref="upload"
          action="#"
          :http-request="addFile"
          multiple
          drag
          :show-file-list="false"
          :limit="5"
          class="flex items-center"
          accept="video/*"
        >
          <plus theme="outline" size="42" />
        </el-upload>
      </div>
      <div class="button" @click="compress">
        <update-rotation theme="outline" size="42" />
      </div>
    </section>
  </main>
</template>

<style lang="scss" scoped>
.button {
  @apply w-20 h-20 rounded-lg bg-white flex justify-center items-center text-slate-600;
}

:deep(.el-upload-dragger) {
  padding: 0 !important;
  border: none !important;
}
</style>
