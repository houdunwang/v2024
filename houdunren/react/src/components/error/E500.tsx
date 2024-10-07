import { useNavigate } from '@tanstack/react-router'
import { Button, Result } from 'antd'

export const E500 = () => {
  const navigate = useNavigate()

  return (
    <main className='w-screen h-screen flex justify-center items-center'>
      <Result
        status='500'
        title='500'
        subTitle='对不起，网站出问题了'
        extra={
          <Button type='primary' onClick={() => navigate({ to: '/' })}>
            返回首页
          </Button>
        }
      />
    </main>
  )
}
