import { ComentContextProvider } from '@/contexts/ComentContext'
import { useGetCommentList } from '@/services/comment'
import { Card } from 'antd'
import classNames from 'classnames'
import React from 'react'
import { CommentItem } from './CommentItem'

interface Props extends React.HTMLAttributes<HTMLDivElement> {
  model_name: string
  model_id: number
}
export const CommentList = React.forwardRef<HTMLDivElement, Props>(
  ({ model_name, model_id, className }, ref) => {
    const { data: comments } = useGetCommentList({ model_name, model_id })
    return (
      <ComentContextProvider>
        <main className={classNames('container', className)} ref={ref}>
          <Card title='评论' className=''>
            <div className='space-y-3'>
              {comments.map((comment) => (
                <div key={comment.id}>
                  <CommentItem comment={comment} />
                  {comment.replies.map((reply) => (
                    <CommentItem key={reply.id} comment={reply} className='ml-12' />
                  ))}
                </div>
              ))}
            </div>
          </Card>
        </main>
      </ComentContextProvider>
    )
  },
)
