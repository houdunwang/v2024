import { IChapter } from '@/types/chapter'
import React, { FC } from 'react'

export const ChapterItem: FC<{ chapter: IChapter }> = ({ chapter }) => {
	return (
		<main className="border rounded-lg overflow-hidden bg-white">
			<div className="">
				<img src={chapter.preview} alt="" />
			</div>
			<div className="font-bold text-lg px-3 py-2">
				{chapter.title}
			</div>
			<div className="px-3 pb-3">
				{chapter.description}
			</div>
		</main>
	)
}
