import React from 'react'
import { LazyLoadImage } from 'react-lazy-load-image-component'
import 'react-lazy-load-image-component/src/effects/blur.css'
interface Props extends React.HTMLAttributes<HTMLDivElement> {
  src: string
  title: string
  desc: string
}

export const ChapterItem = React.forwardRef<HTMLDivElement, Props>(
  ({ src, title, desc }, ref) => {
    return (
      <div className='border rounded-lg overflow-hidden cursor-pointer' ref={ref}>
        <div className='h-60 overflow-hidden'>
          <div className='hover:scale-110 duration-300'>
            <LazyLoadImage effect='blur' src={src} alt='' className='' />
          </div>
        </div>
        <div className='p-3'>
          <div className='font-bold mb-2'>{title}</div>
          <div className='text-sm'>{desc}</div>
        </div>
      </div>
    )
  },
)
