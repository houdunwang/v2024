import { createRootRoute, Outlet } from '@tanstack/react-router';
import { TanStackRouterDevtools } from '@tanstack/router-devtools';
import { ConfigProvider, theme } from 'antd';
import zhCN from 'antd/locale/zh_CN';
import dayjs from 'dayjs';
import 'dayjs/locale/zh-cn';
import relativeTime from 'dayjs/plugin/relativeTime'
dayjs.extend(relativeTime)

import { useState } from 'react';
import { useColorModelClassChange, useListenerSystemColor } from '../hooks/useTheme';
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
