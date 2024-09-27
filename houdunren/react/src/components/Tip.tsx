import classNames from 'classnames'
import React from 'react'
import { Card, CardContent, CardFooter, CardHeader, CardTitle } from './ui/card'
import { Button } from './ui/button'
interface Props extends React.HTMLAttributes<HTMLDivElement> {}
export const Tip = React.forwardRef<HTMLDivElement, Props>(({ className }, ref) => {
  return (
    <Card>
      <CardHeader>
        <CardTitle>社区小贴</CardTitle>
      </CardHeader>
      <CardContent>
        <div className='text-base text-center leading-7'>
          后盾人是一个主张友好、分享、自由的技术交流社区。 <br />
          请记住我们的口号 <br />
          <div className='text-amber-600 font-bold'> 后盾人 人人做后盾</div>
        </div>
      </CardContent>
      <CardFooter className='flex justify-between  border-gray-200 pt-3'>
        <Button variant='outline'>发贴交流</Button>
        <Button
          variant='outline'
          className='bg-primary hover:bg-orange-500 hover:text-white text-white'>
          订阅优惠
        </Button>
        <Button variant='outline'>每晚直播</Button>
      </CardFooter>
    </Card>
  )
})
