import { ipcMain, IpcMainEvent } from 'electron'
import { getByNameWindow, getWindowByEvent } from './windows'

ipcMain.on('openWindow', (_event: IpcMainEvent, name: WindowNameType) => {
  getByNameWindow(name).show()
})

ipcMain.on('closeWindow', (_event: IpcMainEvent, name: WindowNameType) => {
  getByNameWindow(name).hide()
})

ipcMain.on(
  'setIgnoreMouseEvents',
  (event: IpcMainEvent, ignore: boolean, options?: { forward: boolean }) => {
    getWindowByEvent(event).setIgnoreMouseEvents(ignore, options)
  }
)
