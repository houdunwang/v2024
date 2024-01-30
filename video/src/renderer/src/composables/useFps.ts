import useConfigStore from '@renderer/store/useConfigStore'
import { DataType } from '@renderer/types'
import { ElMessage, ElMessageBox } from 'element-plus'
import { ref } from 'vue'

export default () => {
  const newValue = ref('')
  const { config } = useConfigStore()

  const add = (type: DataType) => {
    config[type == 'size' ? 'sizes' : 'frames'].push(newValue.value)

    ElMessage({ message: '添加成功', type: 'success', grouping: true })
    newValue.value = ''
  }

  const remove = async (type: DataType, index: number) => {
    await ElMessageBox.confirm('确定删除吗？')
    config[type == 'size' ? 'sizes' : 'frames'].splice(index, 1)
    ElMessage({ message: '删除成功', type: 'success', grouping: true })
  }

  return { newValue, add, remove }
}
