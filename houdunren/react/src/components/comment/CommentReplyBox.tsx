import { CommentContext } from '@/contexts/ComentContext'
import { IComment } from '@/types/comment'
import classNames from 'classnames'
import React, { useContext } from 'react'
import { Button } from '../ui/button'
import { Textarea } from '../ui/textarea'

interface Props extends React.HTMLAttributes<HTMLDivElement> {
  comment: IComment
}
export const CommentReplyBox = React.forwardRef<HTMLDivElement, Props>(
  ({ comment }, ref) => {
    const { replyId } = useContext(CommentContext)!
    return (
      <div
        className={classNames(
          'mt-2 flex flex-col items-start',
          replyId === comment.id ? 'flex' : 'hidden',
        )}
        ref={ref}>
        <Textarea />
        <Button variant='outline' size={'sm'} className='mt-2'>
          提交
        </Button>
      </div>
    )
  },
)
