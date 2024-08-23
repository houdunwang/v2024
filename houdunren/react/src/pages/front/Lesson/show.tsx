import { LessonItem } from '@/components/LessonItem'
import { LessonVideoList } from '@/components/LessonVideoList'
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
        <LessonVideoList />
        <div className='hidden lg:flex -mt-32 '>
          <LessonItem src={`/images/lesson/${Random.integer(1, 12)}.jpeg`} />
        </div>
      </section>
    </main>
  )
}
