import { app, BrowserWindow, globalShortcut, ipcMain } from 'electron'
import { IpcMainInvokeEvent } from 'electron/main'
const config = {
  search: ''
}
export const registerShortCut = (win: BrowserWindow) => {
  // 检查快捷键是否注册成功
  // console.log(globalShortcut.isRegistered('CommandOrControl+X'))
  ipcMain.handle('shortCut', (_event: IpcMainInvokeEvent, type: 'search', shortCut: string) => {
    if (config.search) globalShortcut.unregister(config.search)
    config.search = shortCut

    switch (type) {
      case 'search':
        return registerSearchShortCut(win, shortCut)
    }
  })
}

function registerSearchShortCut(win: BrowserWindow, shortCut: string) {
  return globalShortcut.register(shortCut, () => {
    win.isVisible() ? win.hide() : win.show()
  })
}

app.on('will-quit', () => {
  // 注销快捷键
  // globalShortcut.unregister('CommandOrControl+X')
  // 注销所有快捷键
  globalShortcut.unregisterAll()
})
