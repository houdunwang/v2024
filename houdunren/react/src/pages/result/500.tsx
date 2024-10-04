import { createFileRoute, useNavigate } from '@tanstack/react-router'
import { Button, Result } from 'antd'

export const Route = createFileRoute('/result/500')({
  component: App,
})

function App() {
  const navigate = useNavigate()
  return (
    <main className='w-screen h-screen flex justify-center items-center'>
      <Result
        status='500'
        title='500'
        subTitle='网站发生错误，请稍后再试.'
        extra={
          <Button type='primary' onClick={() => navigate({ to: '/' })}>
            返回首页
          </Button>
        }
      />
    </main>
  )
}
