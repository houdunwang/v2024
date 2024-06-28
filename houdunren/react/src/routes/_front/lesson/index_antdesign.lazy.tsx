import { Badge } from '@/components/Badge';
import { LessonCard } from '@/components/LessonCard';
import { createLazyFileRoute } from '@tanstack/react-router'
import { Card, List, Radio } from 'antd'
import Search from 'antd/es/input/Search'
import { Random } from 'mockjs';
import { useState } from 'react';

export const Route = createLazyFileRoute('/_front/lesson/index_antdesign')({
	component: Lesson
})

function Lesson() {
	const [value4, setValue4] = useState('color');
	return (
		<main className="container">
			<Card title="碎片课程" bordered={false} extra={
				<div className='grid grid-cols-[auto_1fr] gap-1'>
					<Radio.Group size='large' options={[
						{ label: '图片', value: 'image' },
						{ label: '颜色', value: 'color' },
					]} onChange={() => { }} value={value4} optionType="button"
						buttonStyle="solid" />
					<Search placeholder="请输入课程关键字用于搜索" enterButton="搜索" size="large" loading={false} />
				</div>
			}>
				<List
					grid={{ gutter: 20, xs: 1, sm: 1, md: 2, xl: 4, xxl: 4 }}
					dataSource={[...Array(12)].map((_, item) => ({ title: Random.cword(10, 20) }))}
					renderItem={(item, index) => (
						<List.Item>
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
						</List.Item>
					)}
				/>

			</Card>
		</main>

	)
}