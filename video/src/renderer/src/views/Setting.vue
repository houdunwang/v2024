<script setup lang="ts">
import Card from '@renderer/components/Card.vue'
import FrameSizeSet from '@renderer/components/FrameSizeSet.vue'
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
  </main>
</template>
