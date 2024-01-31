import useConfigStore from '@renderer/store/useConfigStore'
import { VideoState, VideoType } from '@renderer/types'
import { ref, toRef, toRefs } from 'vue'

export default () => {
  const { config } = useConfigStore()
  const video = ref<VideoType>()
  const getCompressFile = () => {
    video.value = config.files.find((video) => video.state == VideoState.READAY)
    if (video.value) video.value.state = VideoState.COMPRESS
  }

  const progressNotice = () => {
    window.api.progressNotice((progress: number) => {
      video.value!.progress = progress
    })
  }

  const compress = () => {
    progressNotice()
    getCompressFile()
    window.api.compress({
      file: { ...video.value! },
      fps: Number(config.frame),
      size: config.size,
      saveDirectory: config.videoSaveDirectory
    })
  }

  return { compress }
}
