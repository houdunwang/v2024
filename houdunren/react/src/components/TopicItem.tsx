import { ITopic } from '@/types/topic'
import { Link } from '@tanstack/react-router'
import classNames from 'classnames'
import { Random } from 'mockjs'
import React from 'react'
import { UserIcon } from './UserIcon'
interface Props extends React.HTMLAttributes<HTMLDivElement> {
  topic: ITopic
}
export const TopicItem = React.forwardRef<HTMLDivElement, Props>(
  ({ topic, className }, ref) => {
    return (
      <div ref={ref}>
        <Link
          to={`/topic/${topic.id}`}
          className={classNames(
            'grid grid-cols-[auto_1fr] content-between gap-2 border-b pb-3',
            className,
          )}>
          <UserIcon src={`/images/user/${1}.jpeg`} />
          <div className='grid grid-flow-row justify-between'>
            <a className='font-bold text-base opacity-90 truncate'>{topic.title}</a>
            <div className='text-xs flex gap-1 self-end '>
              更新于 {Random.integer(2, 100)}天前
            </div>
          </div>
        </Link>
      </div>
    )
  },
)
