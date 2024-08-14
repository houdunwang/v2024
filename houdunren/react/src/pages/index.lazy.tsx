import { createLazyFileRoute } from '@tanstack/react-router'
import { Activities } from '@/components/Activities'
import { Footer } from '@/components/Footer'
import { Learn } from '@/components/Learn'
import { Navbar } from '@/components/Navbar'
import { Tip } from '@/components/Tip'
export const Route = createLazyFileRoute('/')({
  component: Index,
})

function Index() {
  return (
    <>
      <Navbar />
      <div className='lg:container px-3 mb-16 grid lg:grid-cols-[1fr_auto] items-start gap-6'>
        <Activities />
        <div className='lg:w-[350px] grid gap-6'>
          <Learn className='lg:order-2' />
          <Tip className='lg:order-1' />
        </div>
      </div>
      <Footer />
    </>
  )
}
