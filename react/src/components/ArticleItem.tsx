import { IArticle } from '@/types/article'
import { Link } from '@tanstack/react-router'
import classNames from 'classnames'
import { FC } from 'react'
import { LazyLoadImage } from 'react-lazy-load-image-component';

export const ArticleItem: FC<{ className?: string, article: IArticle }> = ({ className, article }) => {
	return (
		<Link to='/front/article/$id' params={{ id: article.id }} className={classNames(className, 'hover:bg-muted duration-200 border rounded-sm mb-3 overflow-hidden flex items-center gap-3')}>
			{/* <img src={article.preview} className='' /> */}
			<LazyLoadImage
				className='w-12 h-12 object-cover'
				src={article.preview} />
			<div className="">
				{article.title}
			</div>
		</Link>
	)
}





