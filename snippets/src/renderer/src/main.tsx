import '@renderer/assets/global.scss'
import '@renderer/assets/tailwind.css'
import React from 'react'
import ReactDOM from 'react-dom/client'
import { RouterProvider } from 'react-router-dom'
import router from './router'
//右键菜单
import { ColorSchemeScript, MantineProvider } from '@mantine/core'
import { ContextMenuProvider } from 'mantine-contextmenu'

import '@mantine/core/styles.layer.css'
import 'mantine-contextmenu/styles.layer.css'
// import './layout.css'
ReactDOM.createRoot(document.getElementById('root') as HTMLElement).render(
  <React.StrictMode>
    <MantineProvider defaultColorScheme="auto">
      <ContextMenuProvider>
        <RouterProvider router={router} />
      </ContextMenuProvider>
    </MantineProvider>
  </React.StrictMode>
)
