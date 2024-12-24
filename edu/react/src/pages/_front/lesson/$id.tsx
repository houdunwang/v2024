import { ChapterItem } from '@/components/chapter/ChapterItem'
import { Error } from '@/components/error/Error'
import { Loading } from '@/components/Loading'
import { AlipayButton } from '@/components/pay/AlipayButton'
import { WepayButton } from '@/components/pay/WepayButton'
import { Badge } from '@/components/ui/badge'
import { useGetLessonDetail } from '@/services/lesson'
import { createFileRoute } from '@tanstack/react-router'

export const Route = createFileRoute('/_front/lesson/$id')({
  component: RouteComponent,
})

function RouteComponent() {
  const { id } = Route.useParams()
  const { isPending, isError, error, data: lesson } = useGetLessonDetail(id)
  if (isPending) return <Loading />
  if (isError) return <Error error={error} />
  return (
    <main className="-mt-6">
      <section className=" text-muted py-12 bg-foreground ">
        <div className="container">
          <h1 className="text-4xl relative">
            <Badge variant="default" className='absolute -top-6 scale-110'>课程</Badge>
            {lesson.title}</h1>
          <div className="mt-6 ">{lesson.description}</div>
          <div className="mt-6 flex gap-3">
            <AlipayButton />
            <WepayButton />
          </div>
        </div>
      </section>
      <section className="container grid grid-cols-4 gap-6 mt-6">
        {lesson.chapters.map((chapter) => (
          <ChapterItem key={chapter.id} chapter={chapter} />
        ))}
      </section>
    </main>
  )
}
