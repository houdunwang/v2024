import { Card } from 'antd'
import classNames from 'classnames'
import React from 'react'
import { CommentItem } from './CommentItem'
interface Props extends React.HTMLAttributes<HTMLDivElement> {}
export const Comment = React.forwardRef<HTMLDivElement, Props>(({ className }, ref) => {
  return (
    <main className={classNames('container', className)} ref={ref}>
      <Card title='评论' className=''>
        <div className='space-y-3'>
          {[...Array(3)].map((_, index) => (
            <CommentItem key={index} />
          ))}
        </div>
      </Card>
    </main>
  )
})
