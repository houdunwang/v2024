import useConfigStore from '@renderer/store/useConfigStore'
import { UploadRequestOptions } from 'element-plus'

export default () => {
  const { config } = useConfigStore()
  const addFile = (options: UploadRequestOptions) => {
    const name = options.file.name
    const path = options.file.path
    config.files.push({ name, path, progress: 29, finish: true })
  }

  const remove = async (index: number) => {
    try {
      // await ElMessageBox.confirm('确定删除吗？')
      config.files.splice(index, 1)
    } catch (error) {}
  }
  const removeAll = () => {
    config.files = []
  }
  return { addFile, remove, removeAll }
}
