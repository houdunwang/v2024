import { Diamond } from '@icon-park/react'
import { Button } from 'antd'
import classNames from 'classnames'
import React from 'react'
interface Props extends React.HTMLAttributes<HTMLDivElement> {}
export const Pay = React.forwardRef<HTMLDivElement, Props>(({ className }, ref) => {
  return (
    <section className={classNames('flex justify-center -mt-32 ', className)} ref={ref}>
      <div className='bg-gradient-to-r from-pink-500 via-red-500 to-yellow-500 px-20 py-12 rounded-lg text-white flex  flex-col justify-center items-center'>
        <div className='text-white mb-3'>
          <Diamond theme='outline' size='120' strokeWidth={3} />
        </div>
        <div className='text-3xl font-bold mb-3'>永恒钻石</div>
        <div className='font-light opacity-80'>可以学习全部课程</div>
        <div className='font-bold text-3xl mt-6'>199元</div>
        <div className='mt-6 flex gap-3 '>
          <Button
            type='primary'
            className='bg-yellow-500 hover:!bg-yellow-400'
            size='large'>
            微信支付
          </Button>
          <Button
            type='primary'
            className='bg-green-600 hover:!bg-green-500'
            size='large'>
            支付宝付款
          </Button>
        </div>
      </div>
    </section>
  )
})
