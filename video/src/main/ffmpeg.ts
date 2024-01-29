import ffmpegPath from '@ffmpeg-installer/ffmpeg'
import ffprobePath from '@ffprobe-installer/ffprobe'
import { IpcMainInvokeEvent } from 'electron'
import ffmpeg from 'fluent-ffmpeg'
import path from 'path'
import { CompressOptions } from './../renderer/src/types'
ffmpeg.setFfmpegPath(ffmpegPath.path)
ffmpeg.setFfprobePath(ffprobePath.path)

export default class Ffmpeg {
  ffmpeg: ffmpeg.FfmpegCommand
  constructor(
    private _event: IpcMainInvokeEvent,
    private options: CompressOptions
  ) {
    this.ffmpeg = ffmpeg(this.options.file.path)
  }
  progressEvent(progress) {
    console.log('Processing: ' + progress.percent + '% done')
  }
  error(error) {
    console.log('An error occurred: ' + error.message)
  }
  end() {
    console.log('Processing finished !')
  }

  private getSaveFilePath() {
    const info = path.parse(this.options.file.name)
    return path.join(
      this.options.saveDirectory,
      `${info.name}-${this.options.size}-${this.options.fps}${info.ext}`
    )
  }

  run() {
    this.ffmpeg
      .fps(this.options.fps)
      .size(this.options.size)
      .videoCodec('libx264')
      .on('progress', this.progressEvent.bind(this))
      .on('error', this.error.bind(this))
      .on('end', this.end.bind(this))
      .save(this.getSaveFilePath())
  }
}
