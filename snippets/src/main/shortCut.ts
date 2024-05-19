import { app, dialog, globalShortcut, ipcMain, IpcMainInvokeEvent } from 'electron'
import { config, findOne } from './db/query'
import { getByNameWindow } from './windows'

// 检查快捷键是否注册成功
ipcMain.handle('shortCut', (_event: IpcMainInvokeEvent, shortCut: string) => {
  return registerSearchShortCut(shortCut)
})

function registerSearchShortCut(shortCut: string) {
  globalShortcut.unregisterAll()
  if (shortCut && globalShortcut.isRegistered(shortCut)) {
    dialog.showErrorBox('温馨提示', '快捷键注册失败，请检查快捷键是否已被占用')
    return false
  }
  const win = getByNameWindow('search')
  return globalShortcut.register(shortCut, () => {
    win.isVisible() ? win.hide() : win.show()
  })
}

app.on('will-quit', () => {
  // 注销所有快捷键
  globalShortcut.unregisterAll()
})

export const registerAppGlobShortcut = () => {
  const configData = config() as { shortCut: string }
  if (configData.shortCut) {
    registerSearchShortCut(configData.shortCut)
  }
}
