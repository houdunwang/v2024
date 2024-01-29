import useConfigStore from '@renderer/store/useConfigStore'
import { VideoState, VideoType } from '@renderer/types'
import { UploadRequestOptions } from 'element-plus'

export default () => {
  const { config } = useConfigStore()
  const addFile = (options: UploadRequestOptions) => {
    const name = options.file.name
    const path = options.file.path
    config.files.push({ name, path, progress: 29, state: VideoState.READAY })
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

  //视频压缩时背景颜色
  const bgColor = (video: VideoType) => {
    return {
      [VideoState.COMPRESS]: '#F9F871',
      [VideoState.ERROR]: '#f3a683',
      [VideoState.FINISH]: '#55efc4'
    }[video.state]
  }
  return { addFile, remove, removeAll, bgColor }
}
