import React from 'react'
import { Badge } from './Badge'
interface Props extends React.HTMLAttributes<HTMLDivElement> {
	img: string,
	title: string,
	description: string,
	lessonCount: number,
	videoCount: number,
}
export const LessonCard = ({ title, img, description, lessonCount, videoCount }: Props) => {
	return (
		<div className="border border-hd-border overflow-hidden rounded-lg cursor-pointer group ">
			<div className="">
				<img alt="example" src={img} className='group-hover:scale-110 duration-500' />
			</div>
			<div className="px-5 pb-5 mt-3">
				<h4 className=' text-base font-bold mb-2'>{title}</h4>
				<div className='text-sm opacity-80'>{description}</div>
			</div>
			<div className='border-t border-hd-border flex justify-between items-center py-3 px-5 text-xs'>
				<div className='flex items-center gap-1'>
					<Badge backgroundColor='bg-red-100'>{lessonCount}</Badge>
					个课程</div>
				<div className='flex items-center gap-1'>
					<Badge backgroundColor='bg-green-100'>{videoCount}</Badge>
					个视频</div>
			</div>
		</div>
	)
}
