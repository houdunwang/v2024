import useConfigStore from '@renderer/store/useConfigStore'
import { VideoState, VideoType } from '@renderer/types'
import { ElMessage } from 'element-plus'
import { ref, toRefs } from 'vue'
import { MainProcessNoticeType } from './../types'

const isRun = ref(false)
export default () => {
  const { config } = useConfigStore()
  const video = ref<VideoType>()
  const { videoSaveDirectory } = toRefs(config)

  const validate = () => {
    let message = ''
    if (videoSaveDirectory.value.trim() === '') message = '视频目录不能为空'
    if (config.files.length === 0) message = '请选择视频文件'
    if (!video.value) message = '视频压缩完毕'
    if (message) ElMessage.warning({ message, grouping: true })
    return message === ''
  }

  const getCompressFile = () => {
    video.value = config.files.find((video) => video.state == VideoState.READAY)
    if (video.value) video.value.state = VideoState.COMPRESS
    else {
      isRun.value = false
    }
    // else ElMessage.success('压缩完毕')
  }

  const progressNotice = () => {
    window.api.mainProcessNotice((type: MainProcessNoticeType, data: any) => {
      switch (type) {
        case MainProcessNoticeType.PROGRESS:
          video.value!.progress = data
          break
        case MainProcessNoticeType.END:
          video.value!.state = VideoState.FINISH
          compress()
          break
        case MainProcessNoticeType.DIREDCTORY_CHECK:
          ElMessage.warning({ message: '视频保存目录不存在', grouping: true })
          video.value!.state = VideoState.READAY
          isRun.value = false
          break
        case MainProcessNoticeType.FILE_IS_EXISTS:
          video.value!.state = VideoState.ERROR
          ElMessage.warning({ message: '视频已经存在', grouping: false })
          compress()
          break
        case MainProcessNoticeType.STOP:
          ElMessage.warning({ message: '转码停止了', grouping: true })
          isRun.value = false
          break
      }
    })
    // window.api.progressNotice((progress: number) => {
    //   video.value!.progress = progress
    // })
  }

  const run = () => {
    if (isRun.value) return
    isRun.value = true
    compress()
  }

  const compress = () => {
    getCompressFile()
    if (validate() === false) return

    window.api.compress({
      file: { ...video.value! },
      fps: Number(config.frame),
      size: config.size,
      saveDirectory: config.videoSaveDirectory
    })
  }

  return { run, isRun, progressNotice }
}
