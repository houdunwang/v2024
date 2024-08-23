import { Play } from '@icon-park/react'
import { Link } from '@tanstack/react-router'
import { Random } from 'mockjs'

export const LessonVideoList = () => {
  return (
    <div className='bg-white py-6 rounded-lg '>
      <div className='border-b pb-3 mb-3'>
        <div className='font-bold mb-3 px-6'>视频列表</div>
        <div className='bg-gray-100 rounded-lg px-3 py-1 mx-6 text-xs'>
          还有 30 课就学完了，加油少年！
        </div>
      </div>
      <div className='px-6 flex flex-col gap-3'>
        {[...Array(16)].map((_, index) => (
          <Link to='/' className='border-b pb-3 flex items-center gap-2' key={index}>
            <Play theme='outline' size='20' strokeWidth={3} />
            <div className='truncate'>{Random.csentence(10, 20)}</div>
          </Link>
        ))}
      </div>
    </div>
  )
}
