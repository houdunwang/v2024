import { Footer } from '@/components/Footer'
import { Navbar } from '@/components/Navbar'
import { WithSuspense } from '@/components/WithSuspense'
import { createFileRoute, Outlet } from '@tanstack/react-router'

export const Route = createFileRoute('/front')({
  component: () => (
    <WithSuspense>
      <Navbar />
      <div className='mb-12'>
        <Outlet />
      </div>
      <Footer />
    </WithSuspense>
  ),
})
