import ffmpegPath from '@ffmpeg-installer/ffmpeg'
import ffprobePath from '@ffprobe-installer/ffprobe'
import { BrowserWindow, dialog } from 'electron'
import ffmpeg from 'fluent-ffmpeg'
import { existsSync, renameSync } from 'fs'
import path from 'path'
import { CompressOptions, MainProcessNoticeType } from './../renderer/src/types'
ffmpeg.setFfmpegPath(ffmpegPath.path.replace('app.asar', 'app.asar.unpacked'))
ffmpeg.setFfprobePath(ffprobePath.path.replace('app.asar', 'app.asar.unpacked'))
dialog.showErrorBox('', ffmpegPath.path)
export default class Ffmpeg {
  // ffmpeg: ffmpeg.FfmpegCommand
  // window: BrowserWindow
  constructor(
    // private event?: IpcMainInvokeEvent,
    private options?: CompressOptions,
    private window?: BrowserWindow,
    private ffmpeg?: ffmpeg.FfmpegCommand
  ) {
    // this.ffmpeg = ffmpeg(this.options.file.path)
    // this.window = BrowserWindow.fromWebContents(this.event.sender)!
  }
  init(win: BrowserWindow, options: CompressOptions) {
    this.window = win
    this.options = options
    this.ffmpeg = ffmpeg(options.file.path)
    return this
  }
  progressEvent(progress) {
    this.window!.webContents.send(
      'mainProcessNotice',
      MainProcessNoticeType.PROGRESS,
      progress.percent,
      this.options!.file.path
    )
    // console.log('Processing: ' + progress.percent + '% done')
  }
  error(error) {
    console.log('An error occurred: ' + error.message)
  }
  end() {
    renameSync(this.tempFile(), this.getSaveFilePath())
    this.window!.webContents.send(
      'mainProcessNotice',
      MainProcessNoticeType.END,
      'end',
      this.options!.file.path
    )
  }

  private validate() {
    if (!existsSync(this.options!.saveDirectory)) {
      this.window!.webContents.send(
        'mainProcessNotice',
        MainProcessNoticeType.DIREDCTORY_CHECK,
        '',
        this.options!.file.path
      )
      return false
    }

    if (existsSync(this.getSaveFilePath())) {
      this.window!.webContents.send(
        'mainProcessNotice',
        MainProcessNoticeType.FILE_IS_EXISTS,
        '',
        this.options!.file.path
      )
      return false
    }
    return true
  }

  stop() {
    try {
      this.ffmpeg!.kill('SIGKILL')
      this.window!.webContents.send(
        'mainProcessNotice',
        MainProcessNoticeType.STOP,
        '',
        this.options!.file.path
      )
    } catch (error) {}
  }

  private getSaveFilePath() {
    const info = path.parse(this.options!.file.name)
    return path.join(
      this.options!.saveDirectory,
      `${info.name}-${this.options!.size}-${this.options!.fps}${info.ext}`
    )
  }
  private tempFile() {
    return path.join(this.options!.saveDirectory, `.temp`)
  }
  run() {
    if (!this.validate()) return
    this.ffmpeg!.fps(this.options!.fps)
      .size(this.options!.size)
      .format('mp4')
      .videoCodec('libx264')
      .videoBitrate(this.options!.videoBitrate * 50)
      .on('progress', this.progressEvent.bind(this))
      .on('error', this.error.bind(this))
      .on('end', this.end.bind(this))
      .save(this.tempFile())
  }
}
