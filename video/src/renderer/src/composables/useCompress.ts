import useConfigStore from '@renderer/store/useConfigStore'

export default () => {
  const { config } = useConfigStore()
  const getCompressFile = () => {
    return config.files[0]
  }

  const compress = () => {
    const file = getCompressFile()
    console.log(file)
    window.api.compress({
      file: { ...file },
      fps: Number(config.frame),
      size: config.size,
      saveDirectory: config.videoSaveDirectory
    })
  }

  return { compress }
}
