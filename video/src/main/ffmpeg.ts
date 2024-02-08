import ffmpegPath from '@ffmpeg-installer/ffmpeg'
import ffprobePath from '@ffprobe-installer/ffprobe'
import { BrowserWindow, IpcMainInvokeEvent, dialog } from 'electron'
import ffmpeg from 'fluent-ffmpeg'
import path from 'path'
import { CompressOptions, MainProcessNoticeType } from './../renderer/src/types'
import { existsSync } from 'fs'
ffmpeg.setFfmpegPath(ffmpegPath.path)
ffmpeg.setFfprobePath(ffprobePath.path)

export default class Ffmpeg {
  ffmpeg: ffmpeg.FfmpegCommand
  window: BrowserWindow
  constructor(
    private event: IpcMainInvokeEvent,
    private options: CompressOptions
  ) {
    this.ffmpeg = ffmpeg(this.options.file.path)
    this.window = BrowserWindow.fromWebContents(this.event.sender)!
  }
  progressEvent(progress) {
    this.window.webContents.send(
      'mainProcessNotice',
      MainProcessNoticeType.PROGRESS,
      progress.percent
    )
    // console.log('Processing: ' + progress.percent + '% done')
  }
  error(error) {
    console.log('An error occurred: ' + error.message)
  }
  end() {
    this.window.webContents.send('mainProcessNotice', MainProcessNoticeType.END, 'end')
    // console.log('Processing finished !')
  }

  private getSaveFilePath() {
    const info = path.parse(this.options.file.name)
    return path.join(
      this.options.saveDirectory,
      `${info.name}-${this.options.size}-${this.options.fps}${info.ext}`
    )
  }
  private validate() {
    if (!existsSync(this.options.saveDirectory)) {
      this.window.webContents.send('mainProcessNotice', MainProcessNoticeType.DIREDCTORY_CHECK, '')
      return false
    }

    if (existsSync(this.getSaveFilePath())) {
      this.window.webContents.send('mainProcessNotice', MainProcessNoticeType.FILE_IS_EXISTS, '')
      return false
    }
    return true
  }

  stop() {
    try {
      this.ffmpeg.kill('SIGKILL')
      this.window.webContents.send('mainProcessNotice', MainProcessNoticeType.STOP, '')
    } catch (error) {}
  }
  run() {
    if (!this.validate()) return
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
