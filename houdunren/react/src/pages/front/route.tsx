import { Footer } from '@/components/Footer'
import { Loading } from '@/components/Loading'
import { Navbar } from '@/components/Navbar'
import { createFileRoute, Outlet } from '@tanstack/react-router'
import { Suspense } from 'react'

export const Route = createFileRoute('/front')({
  component: () => (
    <Suspense fallback={<Loading />}>
      <Navbar />
      <div className=' mb-12'>
        <Outlet />
      </div>
      <Footer />
    </Suspense>
  ),
})
