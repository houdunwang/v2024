import { Tip } from '@/components/Tip'
import { TopicItem } from '@/components/TopicItem'
import { EmotionHappy } from '@icon-park/react'
import { createFileRoute } from '@tanstack/react-router'
import { Card, Pagination } from 'antd'

export const Route = createFileRoute('/front/topic/')({
  component: () => (
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
            {[...Array(10)].map((_, i) => (
              <TopicItem key={i} i={i} />
            ))}
          </div>
        </Card>
        <div className='bg-white rounded-lg p-3 mt-3'>
          <Pagination defaultCurrent={1} total={50} />
        </div>
      </div>

      <Tip />
    </div>
  ),
})
