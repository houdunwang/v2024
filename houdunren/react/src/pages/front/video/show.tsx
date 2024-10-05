import { LessonVideoList } from '@/components/LessonVideoList'
import { createFileRoute } from '@tanstack/react-router'
import { Button } from 'antd'
import { Random } from 'mockjs'

export const Route = createFileRoute('/front/video/show')({
  component: Page,
})

function Page() {
  return (
    <main className='-mt-6'>
      <section className='bg-slate-900 '>
        <div className='container'>
          <video src='' className='w-full' autoPlay controls loop muted></video>
        </div>
      </section>
      <section className='container '>
        <div className='bg-white p-6 rounded-lg flex flex-col lg:flex-row justify-between'>
          <div className=''>
            <div className='text-lg font-bold'>{Random.csentence(10, 30)}</div>
            <div className='text-sm mt-1 text-gray-500'>{Random.csentence(6, 20)} </div>
          </div>
          <div className='flex gap-1'>
            <Button
              type='primary'
              size='small'
              className='bg-indigo-500 hover:!bg-indigo-400'>
              章节列表
            </Button>
            <Button
              type='primary'
              size='small'
              className='bg-orange-500 hover:!bg-orange-400'>
              高清下载
            </Button>
            <Button
              type='primary'
              size='small'
              className='bg-lime-500 hover:!bg-lime-400'>
              上一集
            </Button>
          </div>
        </div>
      </section>
      <section className='mt-6 container grid lg:grid-cols-[350px_1fr]'>
        {/* <LessonVideoList /> */}
        {/* <Comment /> */}
      </section>
    </main>
  )
}
