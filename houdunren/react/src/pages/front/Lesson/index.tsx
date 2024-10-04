import { LessonItem } from '@/components/LessonItem'
import { Page } from '@/components/Page'
import {
  Card,
  CardContent,
  CardFooter,
  CardHeader,
  CardTitle,
} from '@/components/ui/card'
import config from '@/config/app'
import { userGetLessonList } from '@/services/lesson'
import { createFileRoute, useNavigate } from '@tanstack/react-router'
import 'react-lazy-load-image-component/src/effects/blur.css'
export const Route = createFileRoute('/front/Lesson/')({
  component: LessonIndex,
  validateSearch: (search: { page: number }) => {
    return {
      page: search.page ?? 1,
    }
  },
})

function LessonIndex() {
  const { page } = Route.useSearch()
  const navigate = useNavigate()
  const {
    data: { data: lessons, meta },
  } = userGetLessonList({ page, row: config.lesson_page_row })

  return (
    <Card className='container'>
      <CardHeader>
        <CardTitle>碎片课程</CardTitle>
      </CardHeader>
      <CardContent className='gap-3 grid md:grid-cols-3 lg:grid-cols-4'>
        {lessons.map((lesson) => (
          <LessonItem key={lesson.id} lesson={lesson} />
        ))}
      </CardContent>
      <CardFooter>
        <Page
          {...meta}
          row={config.lesson_page_row}
          change={(page) => navigate({ to: '/front/Lesson', search: { page } })}
        />
      </CardFooter>
    </Card>
  )
}
