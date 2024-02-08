import useConfigStore from '@renderer/store/useConfigStore'
import { VideoState, VideoType } from '@renderer/types'
import { ElMessage, UploadRequestOptions } from 'element-plus'

export default () => {
  const { config } = useConfigStore()
  const addFile = (options: UploadRequestOptions) => {
    const name = options.file.name
    const path = options.file.path
    config.files.push({ name, path, progress: 0, state: VideoState.READAY })
  }

  const remove = async (index: number) => {
    try {
      const video = config.files[index]
      if (video.state === VideoState.COMPRESS) ElMessage.warning('请等待视频压缩完成')
      else config.files.splice(index, 1)
    } catch (error) {}
  }
  const removeAll = () => {
    config.files = []
  }

  const resetAllVideo = () => {
    config.files.forEach((item) => {
      item.progress = 0
      item.state = VideoState.READAY
    })
  }

  //视频压缩时背景颜色
  const bgColor = (video: VideoType) => {
    return {
      [VideoState.COMPRESS]: '#F9F871',
      [VideoState.ERROR]: '#f3a683',
      [VideoState.FINISH]: '#55efc4'
    }[video.state]
  }
  return { addFile, remove, removeAll, bgColor, resetAllVideo }
}
