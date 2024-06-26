import { createRootRoute, Outlet } from '@tanstack/react-router';
import { TanStackRouterDevtools } from '@tanstack/router-devtools';
import { ConfigProvider, theme } from 'antd';
import { useColorModelClassChange, useListenerSystemColor, useTheme } from '../hooks/useTheme';
import zhCN from 'antd/locale/zh_CN';
import dayjs from 'dayjs';
import 'dayjs/locale/zh-cn';
import { useState } from 'react';
dayjs.locale('zh-cn');
export const Route = createRootRoute({
	component: RootRoute
})

function RootRoute() {
	const [isDark, setDark] = useState(document.documentElement.classList.contains('dark'))
	useListenerSystemColor()
	useColorModelClassChange((isDark) => {
		setDark(isDark);
	})
	return (
		<ConfigProvider locale={zhCN} theme={{ algorithm: isDark ? theme.darkAlgorithm : theme.defaultAlgorithm }}>
			<Outlet />
			<TanStackRouterDevtools />
		</ConfigProvider >
	)
}
