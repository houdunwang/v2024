import { ChapterItem } from '@/components/chapter/ChapterItem'
import { Error } from '@/components/error/Error'
import { Loading } from '@/components/Loading'
import { Button } from '@/components/ui/button'
import { useGetLessonDetail } from '@/services/lesson'
import { Alipay, Wechat } from '@icon-park/react'
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
          <h1 className="text-4xl">{lesson.title}</h1>
          <div className="mt-6 ">{lesson.description}</div>
          <div className="mt-6 flex gap-3">
            <Button
              variant="default"
              className="flex bg-blue-600 hover:bg-blue-500"
            >
              <Alipay theme="filled" size="30" /> 支付宝
            </Button>
            <Button
              variant="default"
              className="flex bg-green-600 hover:bg-green-500"
            >
              <Wechat theme="outline" size="30" />
              微信支付
            </Button>
          </div>
        </div>
      </section>
      <section className="container grid grid-cols-3 gap-6 mt-6">
        {lesson.chapters.map((chapter) => (
          <ChapterItem key={chapter.id} chapter={chapter} />
        ))}
      </section>
    </main>
  )
}
