import { Badge } from '@/components/Badge';
import { LessonCard } from '@/components/LessonCard';
import { createLazyFileRoute } from '@tanstack/react-router'
import { Card, List, Pagination, Radio } from 'antd'
import Search from 'antd/es/input/Search'
import { Random } from 'mockjs';
import { useState } from 'react';

export const Route = createLazyFileRoute('/_front/lesson/')({
	component: Lesson
})

function Lesson() {
	const [value4] = useState('color');
	return (
		<main className="container bg-hd-background rounded-lg items-center py-10 p-0">
			<section className=" border-b grid grid-cols-2 pb-5 px-5">
				<h4 className='text-lg'>碎片课程</h4>
				<div className='grid grid-cols-[auto_1fr] gap-2'>
					<Radio.Group size='large' options={[
						{ label: '图片', value: 'image' },
						{ label: '颜色', value: 'color' },
					]} onChange={() => { }} value={value4} optionType="button"
						buttonStyle="solid" />
					<Search placeholder="请输入课程关键字用于搜索" enterButton="搜索" size="large" loading={false} />
				</div>
			</section>

			<section className="grid md:grid-cols-3 lg:grid-cols-4 gap-3 mt-5 px-5">
				{
					[...Array(12)].map((_, index) => (
						<LessonCard key={index}
							header={
								<img alt="example" src={`/images/lesson/${index + 1}.jpg`} className='group-hover:scale-110 duration-500' />
							}
							footer={
								<LessonCard.Footer>
									<div className='flex items-center gap-1'>
										<Badge backgroundColor='bg-red-100'>{Random.integer(10, 100)}</Badge>
										个视频</div>
								</LessonCard.Footer>
							}
							title={Random.ctitle(10, 20)}
							description={Random.csentence(10, 20)} >
						</LessonCard>
					))
				}
			</section>
			<section className='mt-5 flex justify-center'>
				<Pagination defaultCurrent={1} total={50} />
			</section>
		</main>

	)
}