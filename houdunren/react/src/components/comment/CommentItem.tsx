import { Delete, Time } from '@icon-park/react'
import { Random } from 'mockjs'
import { UserIcon } from '../UserIcon'
export const CommentItem = () => {
  return (
    <section className='border rounded-lg overflow-hidden'>
      <div className='p-3 flex justify-between items-center'>
        <div className='flex gap-2 '>
          <UserIcon
            src={`/images/user/${Random.integer(1, 10)}.jpeg`}
            className='w-10 h-10'
          />
          <div className='flex flex-col justify-between text-gray-500'>
            <p className='text-sm font-bold'>{Random.csentence(5, 10)}</p>
            <div className='flex text-xs '>
              <Time theme='outline' size='16' strokeWidth={3} /> 发表于
              {Random.integer(10, 30)}天前
            </div>
          </div>
        </div>
        <div className=''>
          <Delete
            theme='outline'
            size='16'
            className='text-gray-900/60 hover:text-gray-900 cursor-pointer duration-300'
            strokeWidth={4}
          />
        </div>
      </div>
      <div className='bg-slate-100 p-3 '>{Random.csentence(20, 40)}</div>
    </section>
  )
}
