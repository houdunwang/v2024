import { BrowserWindow, BrowserWindowConstructorOptions, screen, shell } from 'electron'
import { join } from 'path'
import icon from '../../resources/icon.png?asset'
import { is } from '@electron-toolkit/utils'
import url from 'node:url'
export interface OptionsType extends Partial<BrowserWindowConstructorOptions> {
  openDevTools?: boolean
  hash?: string
}

export function createWindow(options: OptionsType): BrowserWindow {
  const { width } = screen.getPrimaryDisplay().workAreaSize
  // Create the browser window.
  const win = new BrowserWindow(
    Object.assign(
      {
        width: 500,
        height: 350,
        center: true,
        x: width - 500,
        y: 0,
        show: false,
        frame: false,
        transparent: true,
        alwaysOnTop: false,
        autoHideMenuBar: true,
        ...(process.platform === 'linux' ? { icon } : {}),
        webPreferences: {
          preload: join(__dirname, '../preload/index.js'),
          sandbox: false
        }
      },
      options
    )
  )

  if (is.dev && options.openDevTools) {
    win.webContents.openDevTools()
  }

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
    win.loadURL(process.env['ELECTRON_RENDERER_URL'] + options.hash)
    // win.loadURL(process.env['ELECTRON_RENDERER_URL'] + '/#config')
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
        hash: 'config/category/contentList'
      })
    )
  }

  return win
}
