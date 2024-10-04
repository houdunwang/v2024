import { ITopic } from '@/types/topic'
import classNames from 'classnames'
import dayjs from 'dayjs'
import { Random } from 'mockjs'
import React from 'react'
import { UserIcon } from './UserIcon'
import { Link } from '@tanstack/react-router'
interface Props extends React.HTMLAttributes<HTMLDivElement> {
  topic: ITopic
}
export const TopicItem = React.forwardRef<HTMLDivElement, Props>(
  ({ className, topic }, ref) => {
    return (
      <main className='' ref={ref}>
        <div
          className={classNames(
            'grid grid-cols-[auto_1fr] content-between gap-2 border-b pb-3',
            className,
          )}>
          <UserIcon src={`/images/user/1.jpeg`} />
          <div className='grid grid-flow-row justify-between'>
            <Link
              to={`/front/topic/${topic.id}`}
              className='font-bold text-base opacity-90 truncate'>
              {topic.title}
            </Link>
            <div className='text-xs flex gap-1 self-end '>
              <a href=''>{topic.user.nickname}</a>
              更新于 {dayjs(topic.updated_at).fromNow()}
            </div>
          </div>
        </div>
      </main>
    )
  },
)
