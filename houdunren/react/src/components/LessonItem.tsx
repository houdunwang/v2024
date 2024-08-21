import { Link } from '@tanstack/react-router'
import { Random } from 'mockjs'
import React from 'react'
import { LazyLoadImage } from 'react-lazy-load-image-component'
import 'react-lazy-load-image-component/src/effects/blur.css'
interface Props extends React.HTMLAttributes<HTMLDivElement> {
  src: string
}
export const LessonItem = React.forwardRef<HTMLDivElement, Props>(({ src }, ref) => {
  return (
    <div
      className='border rounded-lg overflow-hidden cursor-pointer bg-white shadow-sm'
      ref={ref}>
      <div className='lg:h-52 overflow-hidden'>
        <Link
          to='/front/Lesson/show'
          className='hover:scale-110 duration-300 block'
          style={{
            transition: 'transform 0.3s ',
          }}>
          <LazyLoadImage effect='blur' src={src} alt='' className='' />
        </Link>
      </div>
      <div className='p-3'>
        <Link to='/front/Lesson/show' className='font-bold mb-2'>
          {Random.csentence(10, 20)}
        </Link>
        <div className='text-sm'>{Random.csentence(10, 20)}</div>
      </div>
    </div>
  )
})
