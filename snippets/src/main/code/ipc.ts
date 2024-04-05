import { BrowserWindow, ipcMain } from 'electron'

export const registerIpc = (win: BrowserWindow) => {
  ipcMain.on('hideWindow', () => {
    win.hide()
  })
}
