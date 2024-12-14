import { Error } from '@/components/error/Error'
import { LessonItem } from '@/components/lesson/LessonItem'
import { Loading } from '@/components/Loading'
import { LessonLayout } from '@/layouts/LessonLayout'
import { useGetLessonList } from '@/services/lesson'
import { createFileRoute } from '@tanstack/react-router'

export const Route = createFileRoute('/_front/lesson/project')({
  component: RouteComponent,
})

function RouteComponent() {
  const { isPending, isError, error, data } = useGetLessonList('project')
  if (isPending) return <Loading />
  if (isError) return <Error error={error} />

  return (
    <LessonLayout
      title="实战项目"
      description="以下是提高你编程能力的实战项目，希望能够帮助到你"
    >
      <div className="grid grid-cols-3 gap-6">
        {data?.data.map((lesson) => (
          <LessonItem key={lesson.id} lesson={lesson} />
        ))}
      </div>
    </LessonLayout>
  )
}
