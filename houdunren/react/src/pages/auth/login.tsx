import { FieldFactory } from '@/components/form/FieldFactory'
import { Button } from '@/components/ui/button'
import app from '@/config/app'
import { AuthLayout } from '@/layouts/AuthLayout'
import { useUserLogin } from '@/services/auth'
import { useValidationError } from '@/store/useValidationError'
import { Wechat } from '@icon-park/react'
import { useForm } from '@tanstack/react-form'
import { createFileRoute } from '@tanstack/react-router'
import { zodValidator } from '@tanstack/zod-form-adapter'
import { message } from 'antd'
import { z } from 'zod'
export const Route = createFileRoute('/auth/login')({
  component: Page,
})

const validateSchema = z.object({
  name: z.string().min(1, { message: '用户名不能为空' }),
  password: z.string().min(1, { message: '密码不能为空' }),
})
function Page() {
  const loginMutation = useUserLogin()
  const navitate = Route.useNavigate()
  const form = useForm({
    validatorAdapter: zodValidator(),
    validators: {
      onChange: validateSchema,
    },
    defaultValues: {
      name: 'admin',
      password: 'admin888',
    },
    onSubmit: async ({ value }) => {
      loginMutation.mutate(value, {
        onSuccess: (data: { token: string }) => {
          message.success({ key: 'message', content: '登录成功' })
          localStorage.setItem(app.token_name, data.token)
          navitate({ to: '/' })
        },
      })
    },
  })
  return (
    <form
      onSubmit={(event) => {
        event.preventDefault()
        event.stopPropagation()
        form.handleSubmit()
      }}>
      <AuthLayout title='登录' img='/images/auth/login.jpg'>
        {/* {JSON.stringify(errors)} */}
        <div className='flex flex-col gap-3'>
          <FieldFactory form={form} name='name' placeholder='请输入帐号或邮箱' />
          <FieldFactory form={form} name='password' placeholder='请输入密码' />
          <FieldFactory form={form} name='code' placeholder='请输入验证码' />
        </div>
        <div className='mt-3 '>
          <Button
            type='submit'
            size='lg'
            className='bg-violet-700 hover:!bg-violet-500 w-full'>
            登录
          </Button>
        </div>
        <div className='flex justify-center mt-3 -mb-8'>
          <div className='bg-green-600 rounded-full p-[5px]'>
            <Wechat theme='outline' size='25' className='text-white' strokeWidth={4} />
          </div>
        </div>
      </AuthLayout>
    </form>
  )
}
