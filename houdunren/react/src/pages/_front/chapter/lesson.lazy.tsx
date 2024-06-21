import { LessonCard } from '@/components/LessonCard'
import { Badge } from '@/components/ui/badge'
import { Button } from '@/components/ui/button'
import { createLazyFileRoute } from '@tanstack/react-router'
import { Card } from 'antd'
import { Download } from 'lucide-react'

export const Route = createLazyFileRoute('/_front/chapter/lesson')({
  component: Lesson,
})

function Lesson() {
  return (
    <main className="-mt-10 ">
      <section className=" bg-slate-800 dark:bg-gray-950 py-10 text-gray-200">
        <div className="container">
          <h1 className="text-2xl relative">
            在线教育平台网站开发
            <Badge className="absolute -top-2 bg-orange-500 rounded-sm">系统课程</Badge>
          </h1>

          <p className="text-base mt-3 opacity-80 font-light">
            使用React、Laravel、Tailwindcss、Typescript、tanstack router、tanstack
            query、shadcn、ant design、zustand、vite
            等技术开发，编程知识点全面。这个项目最终会真正用在后盾网站上，所以这不单单是个课程，还是一个真正线上运营的项目
          </p>
          <div className="mt-3">
            <Button
              className="bg-blue-400 hover:bg-blue-500 flex items-center gap-1 rounded-sm"
              size={'sm'}>
              <Download size={15} strokeWidth={3} /> 高清下载
            </Button>
          </div>
        </div>
      </section>
      <section className="container bg-background p-5 rounded-lg grid grid-cols-4 mt-10 gap-5">
        {[...Array(9)].map((_, index) => (
          <LessonCard key={index} />
        ))}
      </section>
    </main>
  )
}
