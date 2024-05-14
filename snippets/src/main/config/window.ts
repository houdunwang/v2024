import { is } from '@electron-toolkit/utils'
import { BrowserWindow, screen, shell } from 'electron'
import url from 'node:url'
import { join } from 'path'
import icon from '../../../resources/icon.png?asset'
export function createWindow(): BrowserWindow {
  const { width: winWidth } = screen.getPrimaryDisplay().workAreaSize
  const width = 550
  const height = 350
  // Create the browser window.
  const win = new BrowserWindow({
    width,
    height,
    center: true,
    x: winWidth - width,
    y: 0,
    show: true,
    frame: true,
    transparent: false,
    alwaysOnTop: true,
    autoHideMenuBar: true,
    ...(process.platform === 'linux' ? { icon } : {}),
    webPreferences: {
      preload: join(__dirname, '../preload/index.js'),
      sandbox: false
    }
  })
  // win.setIgnoreMouseEvents(true, { forward: true })
  win.webContents.openDevTools()
  win.on('ready-to-show', () => {
    win.show()
  })

  win.webContents.setWindowOpenHandler((details) => {
    shell.openExternal(details.url)
    return { action: 'deny' }
  })

  // HMR for renderer base on electron-vite cli.
  // Load the remote URL for development or the local html file for production.
  if (is.dev && process.env['ELECTRON_RENDERER_URL']) {
    win.loadURL(process.env['ELECTRON_RENDERER_URL'] + '/#config/category')
  } else {
    // win.loadFile(join(__dirname, '../renderer/index.html' + '/#config'))
    win.loadURL(
      url.format({
        //编译后的文件
        pathname: join(__dirname, '../renderer/index.html'),
        //协议
        protocol: 'file',
        //protocol 后面需要两个/
        slashes: true,
        //hash 的值
        hash: 'config/category'
      })
    )
  }

  return win
}
