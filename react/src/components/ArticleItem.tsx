import { IArticle } from '@/types/article'
import { Link } from '@tanstack/react-router'
import classNames from 'classnames'
import { FC } from 'react'
import { LazyLoadImage } from 'react-lazy-load-image-component';
import { Button } from './ui/button';
import { AlertDialog, AlertDialogAction, AlertDialogCancel, AlertDialogContent, AlertDialogDescription, AlertDialogFooter, AlertDialogHeader, AlertDialogTitle, AlertDialogTrigger } from './ui/alert-dialog';
import { useDelArticle } from '@/services/article';
import { message } from 'antd';

export const ArticleItem: FC<{ className?: string, article: IArticle }> = ({ className, article }) => {
	return (
		<div className={classNames(className, 'hover:bg-muted duration-200 border rounded-sm mb-3 overflow-hidden flex items-center gap-3')}>
			<LazyLoadImage
				className='w-12 h-12 object-cover'
				src={article.preview} />
			<div className="flex justify-between flex-1">
				<Link to='/front/article/$id' params={{ id: article.id }} >{article.title}</Link>
				<div className="mr-3 flex gap-2">
					<DelArticleButton article={article} />
					<Link to='/front/edit/$id' params={{ id: article.id }}>
						<Button variant="outline" size={'sm'}>编辑</Button>
					</Link>
				</div>
			</div>
		</div>
	)
}


interface Props {
	article: IArticle
}
function DelArticleButton({ article }: Props) {
	const delMutation = useDelArticle()
	const delArtitle = () => {
		delMutation.mutate(article.id, {
			onSuccess: () => {
				message.info({ content: '删除成功', key: 'info' })
			}
		})
	}

	return <AlertDialog>
		<AlertDialogTrigger asChild>
			<Button variant="outline" size={'sm'} disabled={!delMutation.isIdle}>
				{!delMutation.isIdle && <span>删除中....</span>}
				删除</Button>
		</AlertDialogTrigger>
		<AlertDialogContent>
			<AlertDialogHeader>
				<AlertDialogTitle>确定删除【{article.title}】文章吗?</AlertDialogTitle>
				<AlertDialogDescription>
					文章删除后将不能恢复，请谨慎操作。
				</AlertDialogDescription>
			</AlertDialogHeader>
			<AlertDialogFooter>
				<AlertDialogCancel>取消</AlertDialogCancel>
				<AlertDialogAction onClick={delArtitle}>删除</AlertDialogAction>
			</AlertDialogFooter>
		</AlertDialogContent>
	</AlertDialog>
}





