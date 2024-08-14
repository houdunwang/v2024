import { Card } from 'antd'
import React from 'react'
import { LearnItem } from './LearnItem'
interface Props extends React.HTMLAttributes<HTMLDivElement> {}
export const Learn = React.forwardRef<HTMLDivElement, Props>(({ className }, ref) => {
  return (
    <Card title='学习动态' className={className} ref={ref}>
      <div className='grid grid-flow-row gap-4'>
        {[...Array(10)].map((_, i) => (
          <LearnItem key={i} i={i} />
        ))}
      </div>
    </Card>
  )
})
