import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card'
import { createFileRoute, notFound, rootRouteId, useLoaderData } from '@tanstack/react-router'
import axios from 'axios'

export const Route = createFileRoute('/front/article/$id')({
	loader: async ({ params }) => {
		try {
			const article = (await axios.get(`http://localhost:3000/article/${params.id}`)).data
			return { article }
		} catch (error) {
			throw notFound({ routeId: '/front' })
		}
	},
	notFoundComponent: () => {
		return <div className='bg-red-500 flex justify-center items-center '>这个页面不有呀...</div>
	},
	component: RouteComponent,
})

function RouteComponent() {
	const { article } = useLoaderData({ from: Route.fullPath })
	// const { id } = Route.useParams()
	// const { isPending, isError, error, data: article } = useGetArticleDetail(id)
	// if (isPending) return <Loading className='py-72' />
	// if (isError) return <Error error={error} />
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
