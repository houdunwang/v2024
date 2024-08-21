import { LessonItem } from '@/components/LessonItem'
import { Play } from '@icon-park/react'
import { createFileRoute, Link } from '@tanstack/react-router'
import { Random } from 'mockjs'

export const Route = createFileRoute('/front/Lesson/show')({
  component: Page,
})

function Page() {
  return (
    <main className=''>
      <section
        className='-mt-6 bg-cover bg-no-repeat '
        style={{
          backgroundImage: 'url(/images/lesson/2.jpeg)',
        }}>
        <div className='backdrop-blur-xl py-16'>
          <div className='container '>
            <div className='text-gray-200 text-xl lg:text-3xl font-bold'>
              {Random.csentence(10, 20)}
            </div>
            <div className='text-white/60 mt-5'>{Random.csentence(20, 50)}</div>
          </div>
        </div>
      </section>
      <section className='container mt-6 grid lg:grid-cols-[1fr_350px] gap-6 items-start'>
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
                {Random.csentence(10, 20)}
              </Link>
            ))}
          </div>
        </div>
        <div className='hidden lg:flex -mt-32 '>
          <LessonItem src={`/images/lesson/${Random.integer(1, 12)}.jpeg`} />
        </div>
      </section>
    </main>
  )
}
