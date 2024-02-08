<script setup lang="ts">
import { CloseOne } from '@icon-park/vue-next'
import useFps from '@renderer/composables/useFps'
import useConfigStore from '@renderer/store/useConfigStore'
import { DataType } from '@renderer/types'
import { computed } from 'vue'

interface Prop {
  type: DataType
  placeholder?: string
  tip?: string
  buttonStyle?: 'success' | 'danger' | 'primary'
}
const props = defineProps<Prop>()
const { config } = useConfigStore()

const list = computed(() => {
  return props.type == 'size' ? config.sizes : config.frames
})

const { add, newValue, remove } = useFps()
</script>

<template>
  <main>
    <el-select :placeholder="props.placeholder">
      <el-option v-for="(item, index) in list" :key="index" :label="item" :value="item">
        <div class="flex justify-between items-center">
          {{ item }}
          <div class="delIcon" @click="remove(props.type, index)" v-if="index > 1">
            <close-one theme="outline" size="15" />
          </div>
        </div>
      </el-option>
    </el-select>
    <div class="flex gap-1 mt-2 items-center">
      <el-input v-model="newValue" :placeholder="props.tip" size="default" clearable />
      <el-button :type="props.buttonStyle" size="default" @click="add(props.type)">增加</el-button>
    </div>
  </main>
</template>

<style lang="scss" scoped>
.delIcon {
  @apply text-slate-300 hover:text-red-500 hover:scale-125 cursor-pointer duration-300;
}
</style>
