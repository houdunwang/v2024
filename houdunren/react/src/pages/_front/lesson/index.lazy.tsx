import { LessonCard } from '@/components/LessonCard'
import { LessonSearch } from '@/components/LessonSearch'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import { RadioGroup, RadioGroupItem } from '@/components/ui/radio-group'
import { createLazyFileRoute } from '@tanstack/react-router'
import { Pagination } from 'antd'
import classnames from 'classnames'
import { useState } from 'react'
// import { Button, Input, Radio, RadioChangeEvent, Space } from 'antd'
export const Route = createLazyFileRoute('/_front/lesson/')({
  component: Lesson,
})

function Lesson() {
  return (
    <main className="bg-background rounded-lg p-5">
      <section className="grid md:grid-cols-2 items-center  mb-3 border-b pb-3">
        <h1 className="text-lg text-gary ">系统课程</h1>
        <LessonSearch />
      </section>

      <section className="grid md:grid-cols-2 lg:grid-cols-4 mt-10 gap-6">
        {[...Array(12)].map((_, index) => (
          <LessonCard key={index} />
        ))}
      </section>
      <div className="mt-5 border-t pt-3">
        <Pagination total={85} showSizeChanger showQuickJumper />
      </div>
    </main>
  )
}
