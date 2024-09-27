import { createLazyFileRoute, useNavigate } from '@tanstack/react-router'
import { Button, Result } from 'antd'

export const Route = createLazyFileRoute('/error/404')({
  component: Page,
})

function Page() {
  const navigate = useNavigate()
  return (
    <div className='flex justify-center items-center h-screen'>
      <Result
        status='404'
        title='404'
        subTitle='你访问的页面不存在'
        extra={
          <Button type='primary' onClick={() => navigate({ to: '/' })}>
            返回首页
          </Button>
        }
      />
    </div>
  )
}
