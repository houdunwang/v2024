import { ILesson } from '@/types/lesson';
import { Link } from '@tanstack/react-router';
import { FC } from 'react';
import { LazyLoadImage } from 'react-lazy-load-image-component';

interface Props {
	lesson: ILesson
}
export const LessonItem: FC<Props> = ({ lesson }) => {
	return (
		<main className="border rounded-lg overflow-hidden">
			<Link to='/lesson/$id' params={{ id: lesson.id }} className="">
				<LazyLoadImage
					src={lesson.preview}
				/>
			</Link>
			<Link to='/lesson/$id' params={{ id: lesson.id }} className='p-3 font-bold text-lg border-houdunren'>{lesson.title}</Link>
			<div className='px-3 pb-3 text-muted-foreground text-sm '>
				<div className="line-clamp-2">
					{lesson.description}
				</div>
			</div>
		</main>
	)
}
