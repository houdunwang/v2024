import { LessonItem } from '@/components/LessonItem'
import { createFileRoute } from '@tanstack/react-router'
import { Card } from 'antd'
import 'react-lazy-load-image-component/src/effects/blur.css'
export const Route = createFileRoute('/front/Lesson/')({
  component: () => (
    <main className='mx-3 lg:container  '>
      <Card title='碎片课程'>
        <div className='gap-3 grid md:grid-cols-3 lg:grid-cols-4'>
          {[...Array(12)].map((_, index) => (
            <LessonItem key={index} src={`/images/lesson/${index + 1}.jpeg`} />
          ))}
        </div>
      </Card>
    </main>
  ),
})
