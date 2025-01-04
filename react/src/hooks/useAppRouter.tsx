import { RouterProvider, createRouter } from '@tanstack/react-router'
import { routeTree } from '@/routeTree.gen'
import { E404 } from '@/components/errors/E404'
const router = createRouter({
	routeTree,
	defaultNotFoundComponent: () => {
		return <E404 />
	}
})
declare module '@tanstack/react-router' {
	interface Register {
		router: typeof router
	}
}
export const useAppRouter = () => {
	const AppRouterProvider = () => {
		return <RouterProvider router={router} />
	}
	return { AppRouterProvider }
}