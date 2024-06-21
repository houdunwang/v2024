import { ChapterCard } from '@/components/ChapterCard'
import { createLazyFileRoute } from '@tanstack/react-router'

export const Route = createLazyFileRoute('/_front/chapter/project')({
  component: Project,
})

export function Project() {
  return (
    <main className="container bg-background rounded-lg p-3">
      <h1 className="font-bold text-2xl text-gary text-center mt-10 mb-3"> 实战项目</h1>
      <p className="text-center">
        系统课程指从零开始学习一门编程语言，比如从零开始学习Javascript编程语言。
      </p>
      <section className="grid lg:grid-cols-2 xl:grid-cols-3 mt-10 gap-6">
        {[...Array(12)].map((_, index) => (
          <ChapterCard key={index} />
        ))}
      </section>
    </main>
  )
}
