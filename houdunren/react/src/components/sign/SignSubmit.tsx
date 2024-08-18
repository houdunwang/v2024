import emoji from '@/config/emoji'
import { Remind } from '@icon-park/react'
import { Button, Card, Input } from 'antd'
export const SignSubmit = () => {
  return (
    <Card title='签到快乐，再接再厉'>
      <div className='flex flex-col gap-3'>
        <Input placeholder='你今天的心情或最想说的话' size='large' />
        <Input placeholder='验证码' size='large' />
      </div>
      <div className='flex items-center gap-3 mt-3 flex-wrap'>
        {emoji.map((item, index) => (
          <div
            key={index}
            className='border-4 rounded-xl w-12 h-12 p-[2px] hover:border-rose-600 duration-300 cursor-pointer'>
            <img src={`/images/emoji/${item}.gif`} alt='' className='h-full' />
          </div>
        ))}
      </div>
      <div className='mt-6 bg-slate-100 p-3 rounded-lg flex items-center gap-3'>
        <Button type='primary'>开始签到</Button>
        <div className='flex items-center gap-1'>
          <Remind theme='outline' size='20' fill='#000000' strokeWidth={3} />
          <div className='opacity-80 text-slate-700'>意义的灌水内容会被删除的</div>
        </div>
      </div>
    </Card>
  )
}
