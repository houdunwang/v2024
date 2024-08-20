import { AuthLayout } from '@/layouts/AuthLayout'
import { Wechat } from '@icon-park/react'
import { createFileRoute } from '@tanstack/react-router'
import { Button, Input } from 'antd'

export const Route = createFileRoute('/auth/login')({
  component: Page,
})

function Page() {
  return (
    <AuthLayout title='登录' img='/images/auth/login.jpg'>
      <div className='flex flex-col gap-3'>
        <Input placeholder='请输入用户名或邮箱' size='large' />
        <Input placeholder='请输入登录密码' size='large' />
        <Input placeholder='请输入验证码' size='large' />
      </div>
      <div className='mt-3 '>
        <Button
          type='primary'
          size='large'
          block
          className='bg-violet-700 hover:!bg-violet-500'>
          登录
        </Button>
      </div>
      <div className='flex justify-center mt-3 -mb-8'>
        <div className='bg-green-600 rounded-full p-[5px]'>
          <Wechat theme='outline' size='25' className='text-white' strokeWidth={4} />
        </div>
      </div>
    </AuthLayout>
  )
}
