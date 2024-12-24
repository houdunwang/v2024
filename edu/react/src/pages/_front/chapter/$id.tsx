import { ChapterItem } from '@/components/chapter/ChapterItem'
import { Error } from '@/components/error/Error'
import { Loading } from '@/components/Loading'
import { AlipayButton } from '@/components/pay/AlipayButton'
import { WepayButton } from '@/components/pay/WepayButton'
import { Badge } from '@/components/ui/badge'
import { Button } from '@/components/ui/button'
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card'
import { useGetChapterDetail } from '@/services/chapter'
import { Alipay, Play, Wechat } from '@icon-park/react'
import { createFileRoute, Link } from '@tanstack/react-router'

export const Route = createFileRoute('/_front/chapter/$id')({
	component: RouteComponent,
})

function RouteComponent() {
	const { id } = Route.useParams()
	const { isPending, isError, error, data: chapter } = useGetChapterDetail(id)
	if (isPending) return <Loading />
	if (isError) return <Error error={error} />

	return (
		<main className="-mt-6">
			<section className=" text-muted py-12 bg-foreground ">
				<div className="container">
					<h1 className="text-4xl relative">
						<Badge variant="default" className='absolute -top-6 scale-110 bg-chart-2'>章节</Badge>
						{chapter.title}</h1>
					<div className="mt-6 ">{chapter.description}</div>
					<div className="mt-6 flex gap-3">
						<AlipayButton />
						<WepayButton />
					</div>
				</div>
			</section>
			<section className='container mt-6'>
				<div className="grid grid-cols-[1fr_350px] gap-6">
					<Card>
						<CardHeader>
							<CardTitle>章节视频</CardTitle>
						</CardHeader>
						<CardContent>
							{chapter.videos.map(video => <Link to='/' key={video.id} className='border-b py-3 flex items-center gap-2'>
								<Play theme="outline" size="16" />	{video.title}
							</Link>)}
						</CardContent>
					</Card>
					<div className="-mt-32">
						<ChapterItem chapter={chapter} />
					</div>
				</div>
			</section>
		</main>
	)
}
