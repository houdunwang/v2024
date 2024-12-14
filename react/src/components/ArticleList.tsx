import { ArticleItem } from '@/components/ArticleItem'
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card'
import { useGetArticleList } from '@/services/article'
import { Error } from './errors/Error'
import { Loading } from './Loading'

export const ArticleList = () => {
	const { isPending, isError, error, data } = useGetArticleList()
	if (isPending) return <Loading />
	if (isError) return <Error error={error} />

	return (
		<section className="container">
			<Card>
				<CardHeader>
					<CardTitle>我的博客</CardTitle>
					<CardDescription>希望我的博客内容给你带来启发  houdunren.com</CardDescription>
				</CardHeader>
				<CardContent>
					{data.map((article) => {
						return <ArticleItem article={article} key={article.id} />
					})}
				</CardContent>
			</Card>
		</section>
	)
}
