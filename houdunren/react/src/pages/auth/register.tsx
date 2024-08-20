import { AuthLayout } from '@/layouts/AuthLayout'
import { Wechat } from '@icon-park/react'
import { createFileRoute } from '@tanstack/react-router'
import { Button, Input } from 'antd'

export const Route = createFileRoute('/auth/register')({
  component: Page,
})

function Page() {
  return (
    <AuthLayout title='注册' img='/images/auth/register.jpg'>
      <div className='flex flex-col gap-3'>
        <Input placeholder='请输入用户名' size='large' />
        <Input placeholder='请输入登录密码' size='large' />
        <Input placeholder='再次输入密码' size='large' />
        <Input placeholder='验证码' size='large' />
      </div>
      <div className='mt-3'>
        <Button
          type='primary'
          size='large'
          block
          className='bg-violet-700 hover:!bg-violet-500'>
          注册
        </Button>
      </div>
    </AuthLayout>
  )
}
