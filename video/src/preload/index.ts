import { electronAPI } from '@electron-toolkit/preload'
import { IpcRendererEvent, contextBridge, ipcRenderer } from 'electron'
import { CompressOptions, MainProcessNoticeType } from '../renderer/src/types'

// Custom APIs for renderer
const api = {
  compress: (options: CompressOptions) => {
    ipcRenderer.invoke('compress', options)
  },
  //选择目录
  selectDirectory: () => {
    return ipcRenderer.invoke('selectDirectory')
  },
  stop() {
    ipcRenderer.send('stop')
  },
  // progressNotice: (callback: (progress: number) => void) => {
  //   ipcRenderer.on('progressNotice', (_event: IpcRendererEvent, progress: number) => {
  //     callback(progress)
  //   })
  // },
  mainProcessNotice: (callback: (type: MainProcessNoticeType, data: any, path: string) => void) => {
    ipcRenderer.on(
      'mainProcessNotice',
      (_event: IpcRendererEvent, type: MainProcessNoticeType, data: any, path: string) => {
        callback(type, data, path)
      }
    )
  }
}

// Use `contextBridge` APIs to expose Electron APIs to
// renderer only if context isolation is enabled, otherwise
// just add to the DOM global.
if (process.contextIsolated) {
  try {
    contextBridge.exposeInMainWorld('electron', electronAPI)
    contextBridge.exposeInMainWorld('api', api)
  } catch (error) {
    console.error(error)
  }
} else {
  // @ts-ignore (define in dts)
  window.electron = electronAPI
  // @ts-ignore (define in dts)
  window.api = api
}
