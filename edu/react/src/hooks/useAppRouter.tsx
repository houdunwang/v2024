import { routeTree } from '@/routeTree.gen'
import { RouterProvider, createRouter } from '@tanstack/react-router'
import { useAuth } from './useAuth'
const router = createRouter({
	routeTree,
	context: {
		auth: undefined!
	}
})
declare module '@tanstack/react-router' {
	interface Register {
		router: typeof router
	}
}

export const useAppRouter = () => {
	const auth = useAuth()
	const AppRouterProvider = () => <RouterProvider router={router} context={{ auth }} />
	return { AppRouterProvider }
}