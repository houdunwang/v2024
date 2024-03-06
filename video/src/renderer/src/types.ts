export type DataType = 'size' | 'frame'

export enum MainProcessNoticeType {
  END = 'end',
  PROGRESS = 'progress',
  ERROR = 'error',
  DIREDCTORY_CHECK = 'directoryCheck',
  STOP = 'stop',
  FILE_IS_EXISTS = 'file_is_exists'
}

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
  videoBitrate: number
  saveDirectory: string
}
