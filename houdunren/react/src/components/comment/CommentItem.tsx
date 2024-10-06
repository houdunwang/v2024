import { useCommentContext } from '@/contexts/ComentContext'
import { IComment } from '@/types/comment'
import { Delete, Next, Time } from '@icon-park/react'
import classNames from 'classnames'
import dayjs from 'dayjs'
import { Random } from 'mockjs'
import React from 'react'
import { Button } from '../ui/button'
import { Textarea } from '../ui/textarea'
import { UserIcon } from '../UserIcon'
import { CommentReplyBox } from './CommentReplyBox'
interface Props extends React.HTMLAttributes<HTMLDivElement> {
  comment: IComment
}
export const CommentItem = React.forwardRef<HTMLDivElement, Props>(
  ({ comment, className }, ref) => {
    const { replyId, setReplyId } = useCommentContext()
    return (
      <main className={className} ref={ref}>
        <section className={classNames('border rounded-lg overflow-hidden')}>
          <div className='p-3 flex justify-between items-center group'>
            <div className='flex gap-2 '>
              <UserIcon
                src={`/images/user/${Random.integer(1, 10)}.jpeg`}
                className='w-10 h-10'
              />
              <div className='flex flex-col justify-between text-gray-500'>
                <p className='text-sm font-bold'>{comment.user.nickname}</p>
                <div className='flex text-xs gap-3'>
                  <div className='flex items-center gap-1'>
                    <Time theme='outline' size='12' strokeWidth={5} /> 发表于
                    {dayjs(comment.created_at).fromNow()}
                  </div>
                  <div
                    className='flex items-center gap-1 hover:text-chart-2 cursor-pointer select-none'
                    onClick={() => {
                      setReplyId(replyId == comment.id ? 0 : comment.id)
                    }}>
                    <Next theme='outline' size='12' strokeWidth={5} />
                    回复 #{comment.id}
                  </div>
                  <div className='hidden group-hover:flex cursor-pointer text-primary items-center gap-1'>
                    <Delete theme='outline' size='12' strokeWidth={5} />
                    删除
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div className='bg-slate-100 p-3 '>{comment.content}</div>
        </section>
        <CommentReplyBox comment={comment} />
      </main>
    )
  },
)

function ReplyBox() {
  return (
    <div className='mt-2 hidden'>
      <Textarea />
      <Button variant='outline' size={'sm'} className='mt-2'>
        提交
      </Button>
    </div>
  )
}
