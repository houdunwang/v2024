import { IVideo } from '@/types/video'
import { Play } from '@icon-park/react'
import { Link } from '@tanstack/react-router'
import { Random } from 'mockjs'
import React from 'react'

interface Props extends React.HTMLAttributes<HTMLDivElement> {
  videos: IVideo[]
}

export const LessonVideoList = React.forwardRef<HTMLDivElement, Props>(
  ({ videos }, ref) => {
    return (
      <div className='bg-white py-6 rounded-lg ' ref={ref}>
        <div className='border-b pb-3 mb-3'>
          <div className='font-bold mb-3 px-6'>视频列表</div>
          <div className='bg-gray-100 rounded-lg px-3 py-1 mx-6 text-xs'>
            还有 30 课就学完了，加油少年！
          </div>
        </div>
        <div className='px-6 flex flex-col gap-3'>
          {videos.map((video) => (
            <Link to='/' className='border-b pb-3 flex items-center gap-2' key={video.id}>
              <Play theme='outline' size='20' strokeWidth={3} />
              <div className='truncate'>{video.title}</div>
            </Link>
          ))}
        </div>
      </div>
    )
  },
)
