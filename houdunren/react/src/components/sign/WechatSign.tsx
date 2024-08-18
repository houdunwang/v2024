import { Card } from 'antd'
import React from 'react'

export const WechatSign = () => {
  return (
    <main className='mt-3'>
      <Card title='某信快签'>
        <div className=''>使用某信签到更快，发送以『签到』开始的的内容。</div>
        <div className=''>
          <img src='/images/sign/input.jpg' alt='' className='h-20' />
        </div>
      </Card>
    </main>
  )
}
