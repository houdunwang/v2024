import { Page } from '@/components/Page'
import { Tip } from '@/components/Tip'
import { TopicItem } from '@/components/TopicItem'
import config from '@/config/config'
import { useGetTopicList } from '@/services/topic'
import { EmotionHappy } from '@icon-park/react'
import { createFileRoute, useNavigate } from '@tanstack/react-router'
import { Card, Pagination } from 'antd'

export const Route = createFileRoute('/front/topic/')({
  component: TopicIndex,
  validateSearch: (search) => {
    return {
      page: search.page ? Number(search.page) : 1,
    }
  },
})

function TopicIndex() {
  const { page } = Route.useSearch()
  const navigate = useNavigate()
  const {
    data: { data: topics, meta },
  } = useGetTopicList({ page, row: config.topic_page_row })
  return (
    <div className='mx-3 lg:container grid lg:grid-cols-[1fr_350px] gap-6 items-start'>
      <div className=''>
        <Card
          title='交流讨论'
          extra={
            <div className='flex items-center gap-1'>
              <EmotionHappy
                theme='outline'
                size='20'
                className='text-green-700'
                strokeWidth={5}
              />
              每次温暖的交流，都会让人身心愉悦
            </div>
          }>
          <div className='grid grid-flow-row gap-3'>
            {topics.map((topic) => (
              <TopicItem key={topic.id} topic={topic} />
            ))}
          </div>
        </Card>
        <div className='bg-white rounded-lg p-3 mt-3'>
          <Page
            {...meta}
            row={config.topic_page_row}
            change={(page) => navigate({ to: '/front/topic', search: { page } })}
          />
        </div>
      </div>
      <Tip />
    </div>
  )
}
