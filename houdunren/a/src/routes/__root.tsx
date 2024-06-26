import { createRootRoute, Outlet } from '@tanstack/react-router'
import { TanStackRouterDevtools } from '@tanstack/router-devtools'
import { useSysteColorMode } from '../hooks/useTheme'

export const Route = createRootRoute({
	component: Root
})

function Root() {
	useSysteColorMode()
	return <>
		<Outlet />
		<TanStackRouterDevtools />
	</>
}
