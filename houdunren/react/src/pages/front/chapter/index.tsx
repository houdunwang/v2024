import { ChapterItem } from '@/components/ChapterItem'
import { useGetChapterList } from '@/services/chapter'
import { IChapterType } from '@/types/chapter'
import { createFileRoute, useSearch } from '@tanstack/react-router'
export const Route = createFileRoute('/front/chapter/')({
  component: Page,
  validateSearch: (search: { type: IChapterType }) => {
    return {
      type: ['project', 'system'].includes(search.type) ? search.type : 'system',
    }
  },
})

const chapterConfig = {
  system: {
    title: '系统课程',
    description: '系统课程指从零开始学习一门编程语言，比如从零开始学习Javascript编程语言',
  },
  project: {
    title: '项目课程',
    description:
      '项目课程是指通过一个完整的项目来学习一门编程语言，比如通过学习一个React项目来学习React编程语言',
  },
}

function Page() {
  const { type } = useSearch({ strict: false })
  const { data } = useGetChapterList(type!)
  return (
    <main className='mx-3 lg:container bg-white rounded-lg p-6'>
      <h1 className='flex justify-center text-3xl mt-12 font-bold  hover:scale-125 transition-transform duration-300 ease-in-out'>
        {chapterConfig[type!].title}
      </h1>
      <div className='text-center mt-6'>{chapterConfig[type!].description}</div>
      <section className='grid md:grid-cols-2 lg:grid-cols-3 gap-6 mt-16'>
        {data.data.map((chapter) => (
          <ChapterItem chapter={chapter} key={chapter.id} />
        ))}
      </section>
    </main>
  )
}
