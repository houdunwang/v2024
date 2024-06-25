import { createFileRoute, Outlet } from '@tanstack/react-router'
import { Navbar } from '../../components/Navbar'

export const Route = createFileRoute('/_front')({
	component: () => (
		<>
			<Navbar />
			<Outlet />
		</>
	)
})