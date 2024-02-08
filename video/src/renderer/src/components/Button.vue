<script setup lang="ts">
import useCompress from '@renderer/composables/useCompress'
import useVideo from '@renderer/composables/useVideo'

const { removeAll, resetAllVideo } = useVideo()
const { isRun } = useCompress()
const stop = () => {
  window.api.stop()
}
</script>

<template>
  <main class="flex justify-center">
    <el-button type="primary" size="small" @click="stop">停止转码</el-button>
    <el-button type="danger" size="small" @click="removeAll" :disabled="isRun">删除全部</el-button>
    <el-button type="warning" size="small" @click="resetAllVideo" :disabled="isRun">
      重置视频</el-button
    >
  </main>
</template>
