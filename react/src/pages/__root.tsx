import { Navbar } from '@/components/Navbar'
import { createRootRoute, Outlet } from '@tanstack/react-router'
import { TanStackRouterDevtools } from '@tanstack/router-devtools'

export const Route = createRootRoute({
	component: () => (
		<>
			<Navbar />
			<Outlet />
			<TanStackRouterDevtools />
		</>
	),
})