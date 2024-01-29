export type DataType = 'size' | 'frame'

//视频状态
export enum VideoState {
  READAY = 'ready',
  COMPRESS = 'compress',
  ERROR = 'error',
  FINISH = 'finish'
}

export type VideoType = {
  name: string
  path: string
  progress: number
  state: VideoState
}

//视频压缩参数类型
export type CompressOptions = {
  file: VideoType
  fps: number
  size: string
  saveDirectory: string
}
