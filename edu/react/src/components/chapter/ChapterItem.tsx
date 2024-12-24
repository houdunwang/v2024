import { IChapter } from '@/types/chapter'
import { Link } from '@tanstack/react-router'
import { FC } from 'react'

export const ChapterItem: FC<{ chapter: IChapter }> = ({ chapter }) => {
	return (
		<main className="border rounded-lg overflow-hidden bg-white">
			<Link to={`/chapter/${chapter.id}`} className="">
				<img src={chapter.preview} alt="" />
			</Link>
			<Link to='/chapter/$id' params={{ id: String(chapter.id) }} className="font-bold text-lg px-3 py-2">
				{chapter.title}
			</Link>
			<div className="px-3 pb-3">
				{chapter.description}
			</div>
		</main>
	)
}
