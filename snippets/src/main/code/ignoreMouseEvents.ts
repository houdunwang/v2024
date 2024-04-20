import { BrowserWindow, ipcMain, IpcMainEvent } from 'electron'

export default (win: BrowserWindow) => {
  ipcMain.on(
    'setIgnoreMouseEvents',
    (_event: IpcMainEvent, ignore: boolean, options?: { forward: boolean }) => {
      win.setIgnoreMouseEvents(ignore, options)
    }
  )
}
