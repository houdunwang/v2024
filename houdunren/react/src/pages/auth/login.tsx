import { AuthLayout } from '@/layouts/AuthLayout'
import { Wechat } from '@icon-park/react'
import { createFileRoute } from '@tanstack/react-router'
import { formOptions, useForm } from '@tanstack/react-form'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { useMutation } from '@tanstack/react-query'
import { useUserLogin } from '@/services/auth'
export const Route = createFileRoute('/auth/login')({
  component: Page,
})

function Page() {
  const loginMutation = useUserLogin()
  const form = useForm({
    defaultValues: {
      name: 'admin',
      password: 'admin888',
    },
    onSubmit: async (data) => {
      loginMutation.mutate(data.value)
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
        <div className='flex flex-col gap-3'>
          <form.Field
            name='name'
            children={(field) => (
              <Input
                placeholder='请输入用户名或邮箱'
                value={field.state.value}
                onChange={(event) => field.handleChange(event.target.value)}
              />
            )}
          />
          <form.Field
            name='password'
            children={(field) => (
              <Input
                value={field.state.value}
                placeholder='请输入登录密码'
                onChange={(event) => field.handleChange(event.target.value)}
              />
            )}
          />
          {/* <Input placeholder='请输入验证码' /> */}
        </div>
        <div className='mt-3 '>
          <Button type='submit' size='lg' className='bg-violet-700 hover:!bg-violet-500'>
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
