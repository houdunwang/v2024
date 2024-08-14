import { Card } from 'antd'
import classNames from 'classnames'
import React from 'react'
interface Props extends React.HTMLAttributes<HTMLDivElement> {}
export const Tip = React.forwardRef<HTMLDivElement, Props>(({ className }, ref) => {
  return (
    <Card title='社区小贴' className={classNames(className)} ref={ref}>
      <div className='text-base text-center leading-7'>
        后盾人是一个主张友好、分享、自由的技术交流社区。 <br />
        请记住我们的口号 <br />
        <div className='text-amber-600 font-bold'> 后盾人 人人做后盾</div>
      </div>
    </Card>
  )
})
