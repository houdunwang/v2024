<script setup lang="ts">
import useConfigStore from '@renderer/store/useConfigStore'
const { config } = useConfigStore()
</script>

<template>
  <main class="bg-white p-3">
    <section class="flex gap-2">
      <el-select v-model="config.size">
        <el-option v-for="(item, index) in config.sizes" :key="index" :label="item" :value="item">
        </el-option>
      </el-select>

      <el-select v-model="config.frame">
        <el-option v-for="(item, index) in config.frames" :key="index" :label="item" :value="item">
        </el-option>
      </el-select>
    </section>
    <section class="mt-2 ">
      <span class="text-sm text-slate-600">码率</span>
      <el-slider v-model="config.videoBitrate" />
    </section>
  </main>
</template>

<style lang="scss"></style>
