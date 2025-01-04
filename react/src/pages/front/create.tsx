import { Form } from '@/components/Form'
import { IArticle } from '@/types/article'
import { createFileRoute } from '@tanstack/react-router'
import { Random } from 'mockjs'
export const Route = createFileRoute('/front/create')({
	component: RouteComponent,
})

function RouteComponent() {
	const data = {
		title: '',
		content: Random.cparagraph(),
		preview: '/images/1.jpeg'
	} as IArticle
	return <Form title="发表文章" data={data} />
}
