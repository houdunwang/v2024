import { ChapterItem } from '@/components/chapter/ChapterItem'
import { Error } from '@/components/error/Error'
import { Loading } from '@/components/Loading'
import { Card, CardContent, CardFooter, CardHeader, CardTitle } from '@/components/ui/card'
import { useGetChapterList } from '@/services/chapter'
import { createFileRoute } from '@tanstack/react-router'

export const Route = createFileRoute('/_front/chapter/')({
	component: RouteComponent,
})

function RouteComponent() {
	const { isPending, isError, error, data } = useGetChapterList()
	if (isPending) return <Loading />
	if (isError) return <Error error={error} />
	return <main className="container">
		<Card>
			<CardHeader>
				<CardTitle>碎片课程</CardTitle>
				{/* <CardDescription>Card Description</CardDescription> */}
			</CardHeader>
			<CardContent>
				<div className="grid grid-cols-4 gap-6">
					{data.data.map(chapter => {
						return <ChapterItem chapter={chapter} key={chapter.id} />
					})}
				</div>
			</CardContent>
			<CardFooter>
				<p>Card Footer</p>
			</CardFooter>
		</Card>

	</main>
}
