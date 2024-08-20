import { AuthLayout } from '@/layouts/AuthLayout'
import { Wechat } from '@icon-park/react'
import { createFileRoute } from '@tanstack/react-router'
import { Button, Input } from 'antd'

export const Route = createFileRoute('/auth/forget')({
  component: Page,
})

function Page() {
  return (
    <AuthLayout title='找回密码' img='/images/auth/forget-password.jpg'>
      <div className='flex flex-col gap-3'>
        <Input placeholder='请输入邮箱或手机号' size='large' />
        <Input placeholder='请输入验证码' size='large' />
        <Input placeholder='请输入新密码' size='large' />
        <Input placeholder='请再次输入密码' size='large' />
      </div>
      <div className='mt-3 '>
        <Button
          type='primary'
          size='large'
          block
          className='bg-violet-700 hover:!bg-violet-500'>
          确认修改
        </Button>
      </div>
    </AuthLayout>
  )
}
