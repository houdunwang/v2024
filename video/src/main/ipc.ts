import { IpcMainInvokeEvent, ipcMain } from 'electron'
import Ffmpeg, { CompressOptions } from './ffmpeg'
import { selectDirectory } from './directory'

//压缩视频
ipcMain.handle('compress', async (event: IpcMainInvokeEvent, options: CompressOptions) => {
  const compress = new Ffmpeg(event, options)
  compress.run()
})

ipcMain.handle('selectDirectory', async () => {
  return selectDirectory()
})
