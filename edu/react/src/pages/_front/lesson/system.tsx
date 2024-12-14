import { Error } from '@/components/error/Error'
import { LessonItem } from '@/components/lesson/LessonItem'
import { Loading } from '@/components/Loading'
import { LessonLayout } from '@/layouts/LessonLayout'
import { useGetLessonList } from '@/services/lesson'
import { createFileRoute } from '@tanstack/react-router'

export const Route = createFileRoute('/_front/lesson/system')({
  component: RouteComponent,
})

function RouteComponent() {
  const { isPending, isError, error, data } = useGetLessonList('system')
  if (isPending) return <Loading />
  if (isError) return <Error error={error} />

  return (
    <LessonLayout
      title="系统课程"
      description="系统课程指从零开始学习一门编程语言，比如从零开始学习Javascript编程语言"
    >
      <div className="grid grid-cols-3 gap-6">
        {data?.data.map((lesson) => (
          <LessonItem key={lesson.id} lesson={lesson} />
        ))}
      </div>
    </LessonLayout>
  )
}
