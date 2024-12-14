import { Error } from '@/components/errors/Error'
import { Loading } from '@/components/Loading'
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card'
import { useGetArticleDetail } from '@/services/article'
import { createFileRoute } from '@tanstack/react-router'

export const Route = createFileRoute('/front/article/$id')({
	component: RouteComponent,
})

function RouteComponent() {
	const { id } = Route.useParams()
	const { isPending, isError, error, data: article } = useGetArticleDetail(id)
	if (isPending) return <Loading className='py-72' />
	if (isError) return <Error error={error} />
	return <Card className='container p-12'>
		<CardHeader>
			<CardTitle>
				<h1 className='text-4xl'>{article.title}</h1>
			</CardTitle>
			<CardDescription className='mt-6'>
				<img src={article.preview} alt="" />
			</CardDescription>
		</CardHeader>
		<CardContent className='text-muted-foreground'>
			{article.content}
		</CardContent>
	</Card>
}
