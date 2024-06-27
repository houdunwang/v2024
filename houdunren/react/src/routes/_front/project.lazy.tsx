import { LessonCard } from '@/components/LessonCard'
import { createLazyFileRoute } from '@tanstack/react-router'
import { Random } from 'mockjs'

export const Route = createLazyFileRoute('/_front/project')({
	component: Project
})

function Project() {
	return (
		<main className="bg-hd-background container rounded-lg py-16">
			<section className="text-center mb-6">
				<h1 className='text-3xl font-bold mb-5'>实战项目</h1>
				<div className="">系统课程指从零开始学习一门编程语言，比如从零开始学习Javascript编程语言。</div>
			</section>
			<section className="grid md:grid-cols-3 gap-5">
				{
					[...Array(12)].map((_, index) => (
						<LessonCard key={index} img={`/images/project/${index + 1}.jpg`} title={Random.ctitle(10, 20)}
							description={Random.csentence(10, 20)} lessonCount={Random.integer(10, 100)} videoCount={Random.integer(10, 100)} />
					))
				}

			</section>
		</main>
	)
}