import { Comment } from '@/components/comment'
import { UserIcon } from '@/components/UserIcon'
import { GoodTwo, Time } from '@icon-park/react'
import { createFileRoute } from '@tanstack/react-router'
import { Random } from 'mockjs'

export const Route = createFileRoute('/front/topic/$id')({
  component: Page,
})

function Page() {
  return (
    <div className='container'>
      <main className='bg-white  rounded-lg'>
        <section className='p-6 '>
          <div className='pb-6 mb-6 border-b'>
            <h1 className='text-xl font-bold mb-4'>{Random.csentence(10, 30)}</h1>
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
          </div>
          <div className='leading-8'>{Random.cparagraph(10, 30)}</div>
        </section>
        <section className='flex flex-col items-center justify-center gap-2 py-6 mt-12 pt-12'>
          <div className='rounded-lg px-3 py-2 bg-[#10ac84] flex justify-center items-center gap-2 text-white text-sm cursor-pointer hover:bg-[#1dd1a1]'>
            <GoodTwo theme='outline' size='20' strokeWidth={3} /> 感谢 87 个朋友的点赞
          </div>
          <div className='flex justify-center gap-2 flex-wrap mt-6 pb-12'>
            {[...Array(10)].map((_, index) => (
              <UserIcon
                key={index}
                src={`/images/user/${Random.integer(1, 10)}.jpeg`}
                className='rounded-full w-10 h-10'
              />
            ))}
          </div>
        </section>
      </main>
      <Comment className='px-0 mt-6' />
    </div>
  )
}
