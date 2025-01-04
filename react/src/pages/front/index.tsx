import { ArticleList } from '@/components/ArticleList'
import { createFileRoute } from '@tanstack/react-router'

export const Route = createFileRoute('/front/')({
	component: RouteComponent,
})

function RouteComponent() {
	return <ArticleList />
}
