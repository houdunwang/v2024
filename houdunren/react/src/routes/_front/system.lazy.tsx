import { createLazyFileRoute } from '@tanstack/react-router'
import { Random } from 'mockjs'
import { LessonCard } from '@/components/LessonCard'
import { Badge } from '@/components/Badge'

export const Route = createLazyFileRoute('/_front/system')({
	component: System
})

function System() {
	return (
		<main className="bg-hd-background container rounded-lg ">
			<section className="text-center py-16">
				<h1 className='text-3xl font-bold mb-5'>系统课程</h1>
				<div className="">系统课程指从零开始学习一门编程语言，比如从零开始学习Javascript编程语言。</div>
			</section>
			<section className="grid md:grid-cols-3 gap-5">
				{
					[...Array(12)].map((_, index) => (
						<LessonCard key={index}
							title={Random.ctitle(10, 20)}
							description={Random.csentence(10, 20)}
							header={
								<img alt="example" src={`/images/system/${index + 1}.jpg`} className='group-hover:scale-110 duration-500' />
							}
							footer={
								<LessonCard.Footer>
									<div className='flex items-center gap-1'>
										<Badge backgroundColor='bg-red-100'>{Random.integer(10, 100)}</Badge>
										个课程</div>
									<div className='flex items-center gap-1'>
										<Badge backgroundColor='bg-green-100'>{Random.integer(10, 100)}</Badge>
										个视频</div>
								</LessonCard.Footer>
							}
						>
						</LessonCard>
					))
				}
			</section>
		</main>
	)
}