import { Error } from '@/components/error/Error'
import { Loading } from '@/components/Loading'
import { Paginate } from '@/components/Paginate'
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from '@/components/ui/card'
import { VideoItem } from '@/components/video/VideoItem'
import { useGetVideoList } from '@/services/video'
import { createFileRoute } from '@tanstack/react-router'

export const Route = createFileRoute('/_front/video/')({
	component: RouteComponent,
	validateSearch: (search: Record<string, any>) => {
		return {
			page: search.page ? Number(search.page) : 1
		}
	}
})

function RouteComponent() {
	const { page } = Route.useSearch()
	const { isPending, isError, error, data } = useGetVideoList(page)
	if (isPending) return <Loading />
	if (isError) return <Error error={error} />
	return <main className="container">
		<Card>
			<CardHeader>
				<CardTitle>最近更新</CardTitle>
				<CardDescription>网站最新更的视频</CardDescription>
			</CardHeader>
			<CardContent>
				{data.data.map(video => <VideoItem key={video.id} video={video} />)}
			</CardContent>
			<CardFooter>
				<Paginate meta={data.meta} />
			</CardFooter>
		</Card>
	</main>
}
