import { app, BrowserWindow, dialog, globalShortcut } from 'electron'
export const registerShortCut = (win: BrowserWindow) => {
  app.whenReady().then(() => {
    // 注册一个'CommandOrControl+X' 快捷键监听器
    const ret = globalShortcut.register("CommandOrControl+Shift+'", () => {
      win.show()
      // console.log('CommandOrControl+X is pressed')
    })

    if (!ret) {
      dialog.showErrorBox('温馨提示', '快捷键注册失败')
      // console.log('registration failed')
    }

    // 检查快捷键是否注册成功
    console.log(globalShortcut.isRegistered('CommandOrControl+X'))
  })

  app.on('will-quit', () => {
    // 注销快捷键
    // globalShortcut.unregister('CommandOrControl+X')

    // 注销所有快捷键
    globalShortcut.unregisterAll()
  })
}
