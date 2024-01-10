<script setup lang="ts">
import { ref } from 'vue'
const frameList = ref([1920, 2160, 1440, 1024])
const frame = ref(1920)
</script>

<template>
  <main class="flex gap-2 px-3 bg-white py-3">
    <el-select v-model="frame">
      <el-option v-for="(item, index) in frameList" :key="index" :label="item" :value="item">
      </el-option>
    </el-select>

    <el-select v-model="frame">
      <el-option v-for="(item, index) in frameList" :key="index" :label="item" :value="item">
      </el-option>
    </el-select>
  </main>
</template>

<style lang="scss"></style>
