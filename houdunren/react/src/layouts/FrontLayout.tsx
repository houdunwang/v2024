import { Footer } from '@/components/Footer'
import { Navbar } from '@/components/Navbar'
import React from 'react'

export const FrontLayout = React.forwardRef<HTMLDivElement, any>(({ children }, ref) => {
  return (
    <div className='' ref={ref}>
      <Navbar />
      <div className='container mb-12'>{children}</div>
      <Footer />
    </div>
  )
})
