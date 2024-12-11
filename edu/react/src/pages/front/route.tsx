import Navbar from '@/components/Navbar'
import { createFileRoute, Outlet } from '@tanstack/react-router'

export const Route = createFileRoute('/front')({
  component: RouteComponent,
})

function RouteComponent() {
  return <div>
		<Navbar/>
		<div className="">
		<Outlet/>
		</div>
	</div>
}
