import classNames from 'classnames'
import { Random } from 'mockjs'
import React from 'react'
import { UserIcon } from './UserIcon'
interface Props extends React.HTMLAttributes<HTMLDivElement> {
  i: number
}
export const ActivityItem = React.forwardRef<HTMLDivElement, Props>(
  ({ className, i }, ref) => {
    return (
      <div
        className={classNames(
          'grid grid-cols-[auto_1fr] content-between gap-2 border-b pb-3',
          className,
        )}
        ref={ref}>
        <UserIcon src={`/images/user/${i + 1}.jpeg`} />
        <div className='grid grid-flow-row justify-between'>
          <a className='font-bold text-base opacity-90 truncate'>
            {Random.csentence(20, 80)}
          </a>
          <div className='text-xs flex gap-1 self-end '>
            <div className='bg-emerald-600 text-white px-2  rounded-md'>签到</div>{' '}
            <a href=''>{Random.ctitle(3, 6)}</a> 更新于 {Random.integer(2, 100)}天前
          </div>
        </div>
      </div>
    )
  },
)
