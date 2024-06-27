import { createLazyFileRoute } from '@tanstack/react-router'
import { Random } from 'mockjs'
import { LessonCard } from '@/components/LessonCard'

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
						<LessonCard key={index} img={`/images/system/${index + 1}.jpg`} title={Random.ctitle(10, 20)}
							description={Random.csentence(10, 20)} lessonCount={Random.integer(10, 100)} videoCount={Random.integer(10, 100)} />
					))
				}

			</section>
		</main>
	)
}