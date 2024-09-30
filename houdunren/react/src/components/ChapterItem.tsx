import { IChapter } from '@/types/chapter'
import { Link } from '@tanstack/react-router'
import React from 'react'
import { LazyLoadImage } from 'react-lazy-load-image-component'
import 'react-lazy-load-image-component/src/effects/blur.css'
interface Props extends React.HTMLAttributes<HTMLDivElement> {
  chapter: IChapter
}

export const ChapterItem = React.forwardRef<HTMLDivElement, Props>(({ chapter }, ref) => {
  return (
    <div className='border rounded-lg overflow-hidden cursor-pointer' ref={ref}>
      <div className='h-60 overflow-hidden'>
        <Link
          to={`/front/chapter/${chapter.id}`}
          className='hover:scale-110 duration-300 block'>
          <LazyLoadImage effect='blur' src={chapter.preview} alt='' className='' />
        </Link>
      </div>
      <div className='p-3'>
        <Link to={`/front/chapter/${chapter.id}`} className='font-bold mb-2'>
          {chapter.title}
        </Link>
        <div className='text-sm line-clamp-2'>{chapter.description}</div>
      </div>
    </div>
  )
})
