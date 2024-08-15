import { createFileRoute } from '@tanstack/react-router'
import { Card } from 'antd'
import { Random } from 'mockjs'
import { LazyLoadImage } from 'react-lazy-load-image-component'
import 'react-lazy-load-image-component/src/effects/blur.css'
export const Route = createFileRoute('/front/Lesson/')({
  component: () => (
    <main className='mx-3 lg:container  '>
      <Card title='碎片课程'>
        <div className='gap-3 grid md:grid-cols-3 lg:grid-cols-4'>
          {[...Array(12)].map((_, index) => (
            <div className='border rounded-lg overflow-hidden cursor-pointer' key={index}>
              <div className='lg:h-52 overflow-hidden'>
                <div className='hover:scale-110 duration-300'>
                  <LazyLoadImage
                    effect='blur'
                    src={`/images/lesson/${index + 1}.jpeg`}
                    alt=''
                    className=''
                  />
                </div>
              </div>
              <div className='p-3'>
                <div className='font-bold mb-2'>{Random.csentence(10, 20)}</div>
                <div className='text-sm'>{Random.csentence(10, 20)}</div>
              </div>
            </div>
          ))}
        </div>
      </Card>
    </main>
  ),
})
