import { Footer } from '@/components/footer'
import { Navbar } from '@/components/Navbar'
import { createLazyFileRoute, Outlet } from '@tanstack/react-router'

export const Route = createLazyFileRoute('/_front')({
  component: () => (
    <div>
      <Navbar />
      <Outlet />
      <Footer />
    </div>
  ),
})
