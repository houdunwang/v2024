import { ChapterItem } from '@/components/ChapterItem'
import { Loading } from '@/components/Loading'
import { ChapterLayout } from '@/layouts/ChapterLayout'
import { useGetChapterList } from '@/services/chapter'
import { createFileRoute, useNavigate } from '@tanstack/react-router'
export const Route = createFileRoute('/front/chapter/system')({
  component: Page,
})

function Page() {
  const { data, isLoading, error } = useGetChapterList('system')
  const navigate = useNavigate()
  if (isLoading) return <Loading />
  if (error) {
    navigate({ to: '/error/404' })
    return <></>
  }
  return (
    <ChapterLayout
      title='系统课程'
      description='系统课程指从零开始学习一门编程语言，比如从零开始学习Javascript编程语言'>
      {data?.data.map((chapter) => <ChapterItem chapter={chapter} key={chapter.id} />)}
    </ChapterLayout>
  )
}
