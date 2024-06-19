import { LessonItem } from '@/components/LessonItem'
import { createLazyFileRoute } from '@tanstack/react-router'

export const Route = createLazyFileRoute('/_front/system')({
  component: System,
})

export function System() {
  return (
    <main className="bg-background rounded-lg p-3">
      <h1 className="font-bold text-2xl text-gary text-center mt-10 mb-3">系统课程</h1>
      <p className="text-center">
        系统课程指从零开始学习一门编程语言，比如从零开始学习Javascript编程语言。
      </p>
      <section className="grid lg:grid-cols-3 mt-10 gap-6">
        {[...Array(12)].map((_, index) => (
          <LessonItem key={index} />
        ))}
      </section>
    </main>
  )
}
