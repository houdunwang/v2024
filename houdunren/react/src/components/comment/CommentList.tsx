import { Card } from 'antd'
import classNames from 'classnames'
import React from 'react'
import { CommentItem } from './CommentItem'
import { useGetCommentList } from '@/services/comment'
interface Props extends React.HTMLAttributes<HTMLDivElement> {
  model_name: string
  model_id: number
}
export const CommentList = React.forwardRef<HTMLDivElement, Props>(
  ({ model_name, model_id, className }, ref) => {
    const { data: comments } = useGetCommentList({ model_name, model_id })
    return (
      <main className={classNames('container', className)} ref={ref}>
        <Card title='评论' className=''>
          <div className='space-y-3'>
            {comments.map((comment) => (
              <>
                <CommentItem key={comment.id} comment={comment} />
                {comment.replies.map((reply) => (
                  <CommentItem key={reply.id} comment={reply} className='ml-12' />
                ))}
              </>
            ))}
          </div>
        </Card>
      </main>
    )
  },
)
