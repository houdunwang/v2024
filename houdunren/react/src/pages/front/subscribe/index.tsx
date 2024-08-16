import { Pay } from '@/components/Pay'
import { Diamond } from '@icon-park/react'
import { createFileRoute } from '@tanstack/react-router'
import { Button } from 'antd'

export const Route = createFileRoute('/front/subscribe/')({
  component: Page,
})

export default function Page() {
  return (
    //
    <main className=''>
      <section
        style={{
          backgroundImage: 'linear-gradient(150deg, rgb(45, 21, 130), rgb(25, 160, 255))',
        }}
        className='-mt-6 flex flex-col items-center justify-center text-white '>
        <div className='text-4xl lg:text-8xl font-bold mt-24'>投资学习是值得的</div>
        <div className='opacity-80 mt-6 text-2xl text-center leading-10 font-light mb-48 '>
          学习网站所有课程，并提供高清版视频下载 <br />
          免费提供 教程案例 下载学习使用
        </div>
      </section>
      <Pay />

      <section className='font-bold text-center mt-12 '>
        随着课程不断增加，订阅价格会有涨幅，越早订阅越划算
        <div className='text-center font-normal mt-3 opacity-80'>
          视频属于虚拟物品，购买后不支持退款，支付的费用仅用于观看视频，并不包含其他服务（如在线解答）{' '}
          <br />
          有问题发到网站，热心的盾友会帮助你的，也可以加入微信群与志同道合的兄弟姐妹交流{' '}
          <br />
          祝你学有所成，加油少年！
        </div>
      </section>
    </main>
  )
}
