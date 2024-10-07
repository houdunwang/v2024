import { WithSuspense } from '@/components/WithSuspense'
import { createFileRoute, Outlet, redirect } from '@tanstack/react-router'
import { message } from 'antd'

export const Route = createFileRoute('/auth')({
  beforeLoad: ({ context }) => {
    if (context.auth.isAuthenticated()) {
      message.success({ key: 'message', content: '你已经登录' })
      return redirect({ to: '/' })
    }
  },
  component: () => (
    <WithSuspense>
      <Outlet />
    </WithSuspense>
  ),
})
