import { app } from 'electron'
import { createWindow } from './window'
import { registerIpc } from './ipc'
import { registerShortCut } from './shortCut'
import ignoreMouseEvents from './ignoreMouseEvents'

app.whenReady().then(() => {
  const win = createWindow()
  registerIpc(win)
  registerShortCut(win)
  ignoreMouseEvents(win)
})
