<script setup lang="ts">
import { ref } from 'vue'
const sizes = ref(['1920x1080', '1024x720'])
const size = ref('1920x1080')

const frames = ref([60, 30])
const frame = ref(60)
</script>

<template>
  <main class="bg-white p-3 flex gap-2">
    <el-select v-model="size" placeholder="">
      <el-option v-for="(item, index) in sizes" :key="index" :label="item" :value="item">
      </el-option>
    </el-select>

    <el-select v-model="frame" placeholder="">
      <el-option v-for="(item, index) in frames" :key="index" :label="item" :value="item">
      </el-option>
    </el-select>
  </main>
</template>

<style lang="scss"></style>
