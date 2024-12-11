import { createRootRoute, Link, Outlet } from '@tanstack/react-router'
import { TanStackRouterDevtools } from '@tanstack/router-devtools'

export const Route = createRootRoute({
	component: () => (
		<>
			<div className="p-2 flex gap-2">
				<Link to="/" className="[&.active]:font-bold">
					Home
				</Link>{' '}
				<Link to="/about" className="[&.active]:font-bold">
					About
				</Link>
				<Link to="/houdunren2" className="[&.active]:font-bold">
					后盾人
				</Link>
			</div>
			<hr />
			<section className="" style={{ backgroundColor: '#388388' }}>
				<Outlet />
			</section>
			<TanStackRouterDevtools />
		</>
	),
})