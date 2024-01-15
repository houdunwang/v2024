<script setup lang="ts">
import useConfigStore from '@renderer/store/useConfigStore'
import { computed, ref } from 'vue'
interface Prop {
  type: 'size' | 'frame'

  placeholder?: string
  tip?: string
  buttonStyle?: 'success' | 'danger' | 'primary'
}
const props = defineProps<Prop>()
const { config } = useConfigStore()
const newValue = ref('')

const list = computed(() => {
  return props.type == 'size' ? config.sizes : config.frames
})
</script>

<template>
  <main>
    <el-select :placeholder="props.placeholder">
      <el-option v-for="(item, index) in list" :key="index" :label="item" :value="item">
      </el-option>
    </el-select>
    <div class="flex gap-1 mt-2 items-center">
      <el-input
        v-model="newValue"
        :placeholder="props.tip"
        size="normal"
        clearable
        @change=""
      ></el-input>
      <el-button :type="props.buttonStyle" size="default" @click="">增加</el-button>
    </div>
  </main>
</template>
