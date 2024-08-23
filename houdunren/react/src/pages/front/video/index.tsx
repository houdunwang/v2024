import { Play, Time } from '@icon-park/react'
import { createFileRoute, Link } from '@tanstack/react-router'
import { Card, Pagination } from 'antd'
import { Random } from 'mockjs'

export const Route = createFileRoute('/front/video/')({
  component: Page,
})

function Page() {
  return (
    <main className='mx-3 lg:container mb-72'>
      <Card title='最近更新' className=''>
        <div className='text-base'>
          {[...Array(16)].map((_, i) => (
            <Link
              to='/front/video/show'
              className='border-b   py-3  first:pt-0 grid lg:grid-cols-[1fr_auto] items-center'
              key={i}>
              <div className='grid grid-flow-col justify-start items-center gap-2'>
                <Play
                  theme='outline'
                  size='20'
                  className='text-green-600'
                  strokeWidth={4}
                />
                <div className='truncate'>{Random.csentence(10, 50)}</div>
                <div className='lg:grid grid-flow-col justify-start items-center gap-1 text-xs text-slate-600/80 hidden'>
                  <Time theme='outline' className='' strokeWidth={3} />
                  {Random.integer(10, 200)} 小时前
                </div>
              </div>

              <div className='justify-self-end hidden lg:flex'>
                <div className='border bg-slate-50 text-xs px-3 py-1 rounded-lg '>
                  {Random.ctitle(10, 20)}
                </div>
              </div>
            </Link>
          ))}
        </div>
      </Card>
      <div className='bg-white p-3 rounded-lg mt-3'>
        <Pagination defaultCurrent={1} total={50} />
      </div>
    </main>
  )
}
