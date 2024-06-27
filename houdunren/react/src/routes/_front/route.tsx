import { createFileRoute, Outlet } from '@tanstack/react-router'
import { Navbar } from '@/components/Navbar'
import { Footer } from '@/components/Footer'

export const Route = createFileRoute('/_front')({
	component: () => (
		<>
			<Navbar />
			<Outlet />
			<Footer />
		</>
	)
})