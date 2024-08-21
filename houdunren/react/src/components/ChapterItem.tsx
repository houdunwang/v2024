import { Link } from '@tanstack/react-router'
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
          <Link to='/front/chapter/show' className='hover:scale-110 duration-300 block'>
            <LazyLoadImage effect='blur' src={src} alt='' className='' />
          </Link>
        </div>
        <div className='p-3'>
          <Link to='/front/chapter/show' className='font-bold mb-2'>
            {title}
          </Link>
          <div className='text-sm'>{desc}</div>
        </div>
      </div>
    )
  },
)
