import { Error } from '@/components/error/Error'
import { Loading } from '@/components/Loading'
import { Paginate } from '@/components/Paginate'
import { TopicItem } from '@/components/topic/TopicItem'
import { Button } from '@/components/ui/button'
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from '@/components/ui/card'
import { useGetTopicList } from '@/services/topic'
import { createFileRoute, Link } from '@tanstack/react-router'

export const Route = createFileRoute('/_front/topic/')({
	component: RouteComponent,
	validateSearch: (search: Record<string, string>) => {
		return {
			page: search.page ? parseInt(search.page) : 1,
		}
	}
})

function RouteComponent() {
	const { page } = Route.useSearch()
	const { isPending, isError, error, data } = useGetTopicList(page)
	if (isPending) return <Loading />
	if (isError) return <Error error={error} />
	return <main className="container">
		<Card>
			<CardHeader>
				<CardTitle className='flex justify-between items-center'>
					话题讨论
					<Link to="/topic/create">
						<Button variant="outline">发表话题</Button>
					</Link>
				</CardTitle>
				<CardDescription>请发表友好、健康的话题</CardDescription>
			</CardHeader>
			<CardContent>
				{data.data.map(topic => <TopicItem topic={topic} key={topic.id} />)}
			</CardContent>
			<CardFooter>
				<Paginate meta={data.meta} />
			</CardFooter>
		</Card>

	</main>
}
