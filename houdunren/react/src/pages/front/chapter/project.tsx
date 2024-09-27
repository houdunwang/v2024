import { getChapterListApi } from '@/api/chapter'
import { ChapterItem } from '@/components/ChapterItem'
import { ChapterLayout } from '@/layouts/ChapterLayout'
import { IChapter } from '@/types/chapter'
import { IPaginate } from '@/types/common'
import { createFileRoute } from '@tanstack/react-router'
import axios from 'axios'
import { useEffect, useState } from 'react'

export const Route = createFileRoute('/front/chapter/project')({
  component: Page,
})

function Page() {
  const [data, setData] = useState<IPaginate<IChapter> | null>(null)
  useEffect(() => {
    getChapterListApi('project').then((data) => setData(data))
  }, [])
  return (
    <ChapterLayout
      title='系统课程'
      description='系统课程指从零开始学习一门编程语言，比如从零开始学习Javascript编程语言'>
      {data?.data.map((chapter) => <ChapterItem chapter={chapter} key={chapter.id} />)}
    </ChapterLayout>
  )
}
