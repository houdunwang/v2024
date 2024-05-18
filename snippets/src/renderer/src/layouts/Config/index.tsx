import { Outlet } from 'react-router-dom'
//右键菜单
import { MantineProvider } from '@mantine/core'
import { ContextMenuProvider } from 'mantine-contextmenu'

import '@mantine/core/styles.layer.css'
import 'mantine-contextmenu/styles.layer.css'
// import styles from './styles.module.scss'
export default function Config() {
  return (
    <MantineProvider defaultColorScheme="auto">
      <ContextMenuProvider>
        <main>
          <Outlet />
        </main>
      </ContextMenuProvider>
    </MantineProvider>
  )
}
