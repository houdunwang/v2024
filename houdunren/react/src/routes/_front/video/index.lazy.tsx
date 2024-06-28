import { createLazyFileRoute } from '@tanstack/react-router'
import { Pagination } from 'antd'
import Search from 'antd/es/input/Search'
import dayjs from 'dayjs'
import { Clock4, MonitorPlay } from 'lucide-react'
import { Random } from 'mockjs'

export const Route = createLazyFileRoute('/_front/video/')({
	component: Video
})

function Video() {
	return (
		<main className="container bg-hd-background rounded-lg py-5 p-0">
			<section className=" border-b grid grid-cols-2 pb-5 px-5 items-center">
				<h4 className='text-lg'>碎片课程</h4>
				<div className=''>
					<Search placeholder="请输入课程关键字用于搜索" enterButton="搜索" size="large" loading={false} />
				</div>
			</section>

			<section className="mt-5 px-5 flex flex-col gap-2 ">
				{
					[...Array(12)].map((_, index) => (
						<div className="flex  justify-between border-b border-hd-border/60 py-2" key={index}>
							<div className='flex items-center gap-1 truncate'>
								<MonitorPlay size={16} className='text-[#16a085]' strokeWidth={2} />
								<div className="truncate">{Random.cword(5, 30)}</div>
								<div className='flex items-center text-xs opacity-75 gap-1'>
									<Clock4 size={12} /> {dayjs(Random.datetime()).fromNow()}
								</div>
							</div>
							<div className='hidden md:flex text-xs px-3 py-1 bg-gray-100 rounded-lg border scale-90 opacity-75'>
								{Random.cword(5, 10)}
							</div>
						</div>
					))
				}
			</section>
			<section className='mt-5 flex justify-center'>
				<Pagination defaultCurrent={1} total={50} />
			</section>
		</main>
	)
}