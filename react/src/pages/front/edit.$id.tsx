import { Error } from '@/components/Error'
import { Form } from '@/components/Form'
import { Loading } from '@/components/Loading'
import { useGetArticleDetail } from '@/services/article'
import { createFileRoute } from '@tanstack/react-router'

export const Route = createFileRoute('/front/edit/$id')({
	component: RouteComponent,
})

function RouteComponent() {
	const { id } = Route.useParams()
	const { isPending, isError, data, error } = useGetArticleDetail(id)
	if (isPending) return <Loading />
	if (isError) return <Error error={error} />
	return <Form title={`修改【${data.title}】文章`} data={data} />
}
