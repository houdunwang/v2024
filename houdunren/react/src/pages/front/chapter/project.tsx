import { ChapterItem } from '@/components/ChapterItem'
import { ChapterLayout } from '@/layouts/ChapterLayout'
import { createFileRoute } from '@tanstack/react-router'
import { Random } from 'mockjs'

export const Route = createFileRoute('/front/chapter/project')({
  component: () => (
    <ChapterLayout
      title='系统课程'
      description='系统课程指从零开始学习一门编程语言，比如从零开始学习Javascript编程语言'>
      {[...Array(12)].map((_, index) => (
        <ChapterItem
          key={index}
          src={`/images/project/${index + 1}.jpeg`}
          title={Random.csentence(10, 20)}
          desc={Random.csentence(20, 60)}
        />
      ))}
    </ChapterLayout>
  ),
})
