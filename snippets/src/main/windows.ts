import { app, BrowserWindow, IpcMainEvent, IpcMainInvokeEvent } from 'electron'
import { createWindow, OptionsType } from './createWindow'

export const config = {
  search: {
    id: 0,
    options: {
      hash: '',
      openDevTools: false
    }
  },
  config: {
    id: 0,
    options: {
      openDevTools: true,
      width: 1300,
      height: 700,
      frame: true,
      transparent: false,
      hash: '/#config/category/contentList'
    }
  }
} as Record<WindowNameType, { id: number; options: OptionsType }>

export const getByNameWindow = (name: WindowNameType) => {
  let win = BrowserWindow.fromId(config[name].id)
  if (!win) {
    win = createWindow(config[name].options)
    config[name].id = win.id
  }
  return win
}

export const getWindowByEvent = (event: IpcMainEvent | IpcMainInvokeEvent) => {
  return BrowserWindow.fromWebContents(event.sender)!
}

app.whenReady().then(() => {
  getByNameWindow('search')
  // getByNameWindow('config')
})
