<script setup lang="ts">
import Card from '@renderer/components/Card.vue'
import FrameSizeSet from '@renderer/components/FrameSizeSet.vue'
import useConfigStore from '@renderer/store/useConfigStore'
const { config } = useConfigStore()
const selectDirectory = async () => {
  const directory = await window.api.selectDirectory()
  if (directory) config.videoSaveDirectory = directory
}
</script>

<template>
  <main class="">
    <Card title="分辨率">
      <FrameSizeSet
        type="size"
        placeholder="分辨率"
        tip="请输入如:1920x1080的格式"
        buttonStyle="primary"
      />
    </Card>
    <Card title="帧数">
      <FrameSizeSet
        type="frame"
        placeholder="帧数设置"
        tip="请设置如: 24的数值"
        buttonStyle="success"
      />
    </Card>
    <Card title="视频保存目录">
      <div class="flex gap-1">
        <el-input
          v-model="config.videoSaveDirectory"
          disabled
          size="default"
          clearable
          @change=""
        ></el-input>
        <el-button type="primary" size="default" @click="selectDirectory">选择</el-button>
      </div>
    </Card>
  </main>
</template>
