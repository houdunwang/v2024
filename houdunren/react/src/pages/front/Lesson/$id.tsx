import { LessonItem } from '@/components/LessonItem'
import { LessonVideoList } from '@/components/LessonVideoList'
import { useGetLesson } from '@/services/lesson'
import { createFileRoute } from '@tanstack/react-router'
import { Random } from 'mockjs'

export const Route = createFileRoute('/front/Lesson/$id')({
  component: Page,
})

function Page() {
  const { id } = Route.useParams()
  const { data: lesson } = useGetLesson(+id)
  return (
    <main className=''>
      {/* {JSON.stringify(lesson)} */}
      <section
        className='-mt-6 bg-cover bg-no-repeat '
        style={{
          backgroundImage: 'url(/images/lesson/2.jpeg)',
        }}>
        <div className='backdrop-blur-xl py-16'>
          <div className='container'>
            <div className='text-gray-200 text-xl lg:text-3xl font-bold'>
              {lesson.title}
            </div>
            <div className='text-white/60 mt-5'>{lesson.description}</div>
          </div>
        </div>
      </section>
      <section className='container mt-6 grid lg:grid-cols-[1fr_350px] gap-6 items-start'>
        <LessonVideoList />
        <div className='hidden lg:flex -mt-32 '>
          <LessonItem lesson={lesson} />
        </div>
      </section>
    </main>
  )
}
