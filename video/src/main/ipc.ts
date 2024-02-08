import { IpcMainInvokeEvent, ipcMain } from 'electron'
import Ffmpeg from './ffmpeg'
import { selectDirectory } from './directory'
import { CompressOptions } from '../renderer/src/types'

//压缩视频
let ffmpeg = null as Ffmpeg | null
ipcMain.handle('compress', async (event: IpcMainInvokeEvent, options: CompressOptions) => {
  const compress = new Ffmpeg(event, options)
  ffmpeg = compress
  compress.run()
})

ipcMain.on('stop', () => {
  ffmpeg?.stop()
})

ipcMain.handle('selectDirectory', async () => {
  return selectDirectory()
})
