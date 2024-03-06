import { BrowserWindow, IpcMainInvokeEvent, ipcMain } from 'electron'
import Ffmpeg from './ffmpeg'
import { selectDirectory } from './directory'
import { CompressOptions } from '../renderer/src/types'

export default (win: BrowserWindow) => {
  //压缩视频
  const ffmpeg = new Ffmpeg()
  ipcMain.handle('compress', async (_event: IpcMainInvokeEvent, options: CompressOptions) => {
    ffmpeg.init(win, options).run()
  })

  ipcMain.on('stop', () => {
    ffmpeg.stop()
  })

  ipcMain.handle('selectDirectory', async () => {
    return selectDirectory()
  })
}
