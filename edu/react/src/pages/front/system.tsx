import { Error } from '@/components/error/Error'
import LessonItem from '@/components/lesson/LessonItem'
import { Loading } from '@/components/Loading'
import { useGetLessonList } from '@/services/lesson'
import { createFileRoute } from '@tanstack/react-router'

export const Route = createFileRoute('/front/system')({
	component: RouteComponent,
})

function RouteComponent() {
	const { isPending, isError, error, data } = useGetLessonList()
	if (isPending) return <Loading />
	if (isError) return <Error error={error} />
	return <div className=''>
		{data.data.map((lesson) => <LessonItem key={lesson.id} />)}
	</div>
}
