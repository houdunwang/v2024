import { Page } from '@/components/Page'
import app from '@/config/app'
import { useGetVideoList } from '@/services/video'
import { Play, Time } from '@icon-park/react'
import { createFileRoute, Link, useNavigate } from '@tanstack/react-router'
import { Card, Pagination } from 'antd'
import dayjs from 'dayjs'
import { Random } from 'mockjs'

export const Route = createFileRoute('/front/video/')({
  component: VideoIndex,
  validateSearch: (search: { page?: number }) => {
    return {
      page: search.page || 1,
    }
  },
})

function VideoIndex() {
  const { page } = Route.useSearch()
  const navigate = useNavigate()
  const {
    data: { data: videos, meta },
  } = useGetVideoList({ page, row: app.video_page_row })
  return (
    <main className='mx-3 lg:container mb-72'>
      <Card title='最近更新' className=''>
        <div className='text-base'>
          {videos.map((video) => (
            <div
              key={video.id}
              className='border-b py-3 first:pt-0 grid
              lg:grid-cols-[1fr_auto] items-center'>
              <div className='grid grid-flow-col justify-start items-center gap-2'>
                <Play
                  theme='outline'
                  size='20'
                  className='text-green-600'
                  strokeWidth={4}
                />
                <Link to='/front/video/show' className='truncate'>
                  {video.title}
                </Link>
                <div className='lg:grid grid-flow-col justify-start items-center gap-1 text-xs text-slate-600/80 hidden'>
                  <Time theme='outline' className='' strokeWidth={3} />
                  发布于 {dayjs(video.created_at).fromNow()}
                </div>
              </div>
              <div className='justify-self-end hidden lg:flex'>
                <Link
                  to={`/front/Lesson/${video.lesson.id}`}
                  className='border bg-slate-50 text-xs px-3 py-1 rounded-lg '>
                  {video.lesson.title}
                </Link>
              </div>
            </div>
          ))}
        </div>
      </Card>
      <div className='bg-white p-3 rounded-lg mt-3'>
        <Page
          {...meta}
          row={app.video_page_row}
          change={(page) => navigate({ to: '/front/video', search: { page } })}
        />
      </div>
    </main>
  )
}
