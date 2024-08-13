import { Card, Pagination } from 'antd'
import { ActivityItem } from './ActivityItem'

export const Activities = () => {
  return (
    <main className=''>
      <Card title='网站动态'>
        <div className='grid grid-flow-row gap-4'>
          {[...Array(10)].map((_, i) => (
            <ActivityItem key={i} i={i} />
          ))}
        </div>
      </Card>
      <div className='bg-white rounded-lg mt-3 py-3 px-6'>
        <Pagination defaultCurrent={1} total={50} />
      </div>
    </main>
  )
}
