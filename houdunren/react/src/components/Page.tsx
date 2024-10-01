import { Pagination } from 'antd'
import _ from 'lodash'
import React, { useCallback, useEffect } from 'react'

interface Props extends React.HTMLAttributes<HTMLDivElement> {
  current_page: number
  total: number
  row: number
  last_page: number
  change: (page: number) => void
}
export const Page = React.forwardRef<HTMLDivElement, Props>(
  ({ current_page, total, last_page, row, change, ...props }, ref) => {
    keyChangePage({ current: current_page, last_page: last_page, change })
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

interface ParamsType {
  current: number
  last_page: number
  change: (page: number) => void
}

function keyChangePage(params: ParamsType) {
  const handle = useCallback(
    (event: KeyboardEvent) => {
      switch (event.code) {
        case 'ArrowLeft':
          if (params.current > 1) params.change(params.current - 1)
          break
        case 'ArrowRight':
          if (params.current < params.last_page) params.change(params.current + 1)
          break
      }
    },
    [params],
  )
  const debounceHandle = _.debounce(handle, 300)
  useEffect(() => {
    document.addEventListener('keyup', debounceHandle)
    return () => {
      document.removeEventListener('keyup', debounceHandle)
    }
  }, [debounceHandle])
}
