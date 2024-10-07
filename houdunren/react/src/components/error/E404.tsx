import { useNavigate } from '@tanstack/react-router'
import { Button, Result } from 'antd'

export const E404 = () => {
  const navigate = useNavigate()

  return (
    <main className='w-screen h-screen flex justify-center items-center'>
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
    </main>
  )
}
