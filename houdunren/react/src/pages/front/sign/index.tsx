import SignList from '@/components/sign/SignList'
import { SignSubmit } from '@/components/sign/SignSubmit'
import { WechatSign } from '@/components/sign/WechatSign'
import { createFileRoute } from '@tanstack/react-router'
import { Card } from 'antd'

export const Route = createFileRoute('/front/sign/')({
  component: Page,
})

function Page() {
  return (
    <main className='mx-3 lg:container'>
      <SignSubmit />
      <WechatSign />
      <Card title='早起少年' className='mt-3'>
        <div className='text-slate-700'>
          早上5:00~7.30签到， 并设置了 收货地址 和 手机号，即可参加 【早起少年】 活动，
          并有机会得到礼品。
        </div>
      </Card>
      <SignList />
    </main>
  )
}
