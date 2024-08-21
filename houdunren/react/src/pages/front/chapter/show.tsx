import { LessonItem } from '@/components/LessonItem'
import { createFileRoute } from '@tanstack/react-router'
import { Random } from 'mockjs'

export const Route = createFileRoute('/front/chapter/show')({
  component: Page,
})

function Page() {
  return (
    <main className=''>
      <section className='bg-[#2c3e50] py-12 -mt-6'>
        <div className='container'>
          <div className='text-gray-200 text-3xl font-bold'>
            {Random.csentence(10, 20)}
          </div>
          <div className='text-white/60 mt-5'>{Random.csentence(20, 50)}</div>
        </div>
      </section>
      <section className='container mt-6 '>
        <div className='grid md:grid-cols-3 lg:grid-cols-4 gap-4 p-3 bg-white rounded-lg'>
          {[...Array(5)].map((_, index) => (
            <LessonItem key={index} src={`/images/lesson/${index + 1}.jpeg`} />
          ))}
        </div>
      </section>
    </main>
  )
}
