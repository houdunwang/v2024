import { Error } from '@/components/error/Error'
import { Loading } from '@/components/Loading'
import { Button } from '@/components/ui/button'
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from '@/components/ui/card'
import { UserAvatar } from '@/components/user/UserAvatar'
import { useGetTopicDetail } from '@/services/topic'
import { createFileRoute } from '@tanstack/react-router'
import dayjs from 'dayjs'

export const Route = createFileRoute('/_front/topic/$id')({
	component: RouteComponent,
})

function RouteComponent() {
	const { id } = Route.useParams()
	const { isPending, isError, error, data: topic } = useGetTopicDetail(+id)

	if (isPending) return <Loading />
	if (isError) return <Error error={error} />
	return <main className="container">
		<Card>
			<CardHeader>
				<CardTitle className='flex justify-between items-center'>
					{topic.title}
					<div className="flex gap-1">
						<Button variant="outline" size={'sm'}>编辑</Button>
						<Button variant="outline" size={'sm'}>删除</Button>
					</div>
				</CardTitle>
				<CardDescription className='flex gap-1 pt-6'>
					<UserAvatar user={topic.user} />
					<div className="flex flex-col  justify-between">
						<span className='font-bold text-sm'>
							{topic.user.nickname}
						</span>
						<span className='text-xs'>发表于 {dayjs(topic.created_at).fromNow()}</span>
					</div>
				</CardDescription>
			</CardHeader>
			<CardContent>
				{topic.content}
			</CardContent>
		</Card>
	</main>
}
