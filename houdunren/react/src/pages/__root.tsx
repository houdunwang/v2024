import { ThemeProvider, useTheme } from '@/hooks/useToggleTheme'
import { createRootRoute, Outlet } from '@tanstack/react-router'
import { TanStackRouterDevtools } from '@tanstack/router-devtools'
import { ConfigProvider, theme } from 'antd'
import zhCN from 'antd/locale/zh_CN'

export const Route = createRootRoute({
  component: () => (
    <>
      <ThemeProvider defaultTheme="dark" storageKey="vite-ui-theme">
        <AntDegisnThemeModel />
      </ThemeProvider>
      <TanStackRouterDevtools />
    </>
  ),
})

function AntDegisnThemeModel() {
  const { theme: mode } = useTheme()
  return (
    <ConfigProvider
      locale={zhCN}
      theme={{
        algorithm: mode === 'dark' ? theme.darkAlgorithm : theme.defaultAlgorithm,
      }}>
      <Outlet />
    </ConfigProvider>
  )
}
