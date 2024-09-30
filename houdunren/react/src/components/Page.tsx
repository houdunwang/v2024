import { useKeyChangePage } from '@/hooks/useKeyChangePage'
import { Pagination } from 'antd'
import React from 'react'

interface Props extends React.HTMLAttributes<HTMLDivElement> {
  current_page: number
  total: number
  row: number
  last_page: number
  change: (page: number) => void
}
export const Page = React.forwardRef<HTMLDivElement, Props>(
  ({ current_page, total, last_page, row, change, ...props }, ref) => {
    useKeyChangePage({ current: current_page, last_page: last_page, change })
    return (
      <div className='' ref={ref}>
        <Pagination
          total={total}
          current={current_page}
          pageSize={row}
          {...props}
          onChange={change}
        />
      </div>
    )
  },
)
