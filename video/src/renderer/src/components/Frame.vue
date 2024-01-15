<script setup lang="ts">
import useConfigStore from '@renderer/store/useConfigStore'
const { config } = useConfigStore()
</script>

<template>
  <main class="bg-white p-3 flex gap-2">
    <el-select v-model="config.size" placeholder="">
      <el-option v-for="(item, index) in config.sizes" :key="index" :label="item" :value="item">
      </el-option>
    </el-select>

    <el-select v-model="config.frame" placeholder="">
      <el-option v-for="(item, index) in config.frames" :key="index" :label="item" :value="item">
      </el-option>
    </el-select>
  </main>
</template>

<style lang="scss"></style>
