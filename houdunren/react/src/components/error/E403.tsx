import { useNavigate } from '@tanstack/react-router'
import { Button, Result } from 'antd'

export const E403 = () => {
  const navigate = useNavigate()

  return (
    <main className='w-screen h-screen flex justify-center items-center'>
      <Result
        status='403'
        title='403'
        subTitle='你没有访问权限'
        extra={
          <Button type='primary' onClick={() => navigate({ to: '/' })}>
            返回首页
          </Button>
        }
      />
    </main>
  )
}
