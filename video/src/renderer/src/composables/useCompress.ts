import useConfigStore from '@renderer/store/useConfigStore'
import { VideoState, VideoType } from '@renderer/types'
import { ref } from 'vue'

export default () => {
  const { config } = useConfigStore()
  const video = ref<VideoType>()

  const compressNotice = () => {
    window.api.progressNotice((progress: number) => {
      video.value!.progress = progress
    })
  }

  const getCompressFile = () => {
    video.value = config.files.find((video) => video.state == VideoState.READAY)
    video.value!.state = VideoState.COMPRESS
  }

  const compress = () => {
    compressNotice()
    getCompressFile()
    window.api.compress({
      file: { ...video.value! },
      fps: Number(config.frame),
      size: config.size,
      saveDirectory: config.videoSaveDirectory
    })
  }

  return { compress, video }
}
