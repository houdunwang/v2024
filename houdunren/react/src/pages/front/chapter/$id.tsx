import { LessonItem } from '@/components/LessonItem'
import { useGetChapter } from '@/services/chapter'
import { createFileRoute } from '@tanstack/react-router'

export const Route = createFileRoute('/front/chapter/$id')({
  component: Page,
})

function Page() {
  const { id } = Route.useParams()
  const { data: chapter } = useGetChapter(+id)
  return (
    <main className=''>
      <section className='bg-[#2c3e50] py-12 -mt-6'>
        <div className='container'>
          <div className='text-gray-200 text-3xl font-bold'>{chapter.title}</div>
          <div className='text-white/60 mt-5'>{chapter.description}</div>
        </div>
      </section>
      <section className='container mt-6 '>
        <div className='grid md:grid-cols-3 lg:grid-cols-4 gap-4 p-3 bg-white rounded-lg'>
          {chapter.lessons.map((lesson) => (
            <LessonItem key={lesson.id} lesson={lesson} />
          ))}
        </div>
      </section>
    </main>
  )
}
