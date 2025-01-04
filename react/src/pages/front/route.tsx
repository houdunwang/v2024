import { createFileRoute, Outlet } from '@tanstack/react-router'

export const Route = createFileRoute('/front')({
	component: RouteComponent,
	notFoundComponent: () => {
		return <div>父级处理 404 </div>
	}
})

function RouteComponent() {
	return <main className="">
		<Outlet />
	</main>
}
