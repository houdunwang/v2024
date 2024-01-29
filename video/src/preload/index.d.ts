import { ElectronAPI } from '@electron-toolkit/preload'
import { CompressOptions } from '@renderer/types'

declare global {
  interface Window {
    electron: ElectronAPI
    api: {
      compress: (options: CompressOptions) => void
      selectDirectory: () => Promise<any>
    }
  }
}
