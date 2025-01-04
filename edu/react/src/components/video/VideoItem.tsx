import { IVideo } from '@/types/video'
import { Play } from '@icon-park/react'
import { Link } from '@tanstack/react-router'
import dayjs from 'dayjs'
export const VideoItem = ({ video }: { video: IVideo }) => {
	return (
		<main className="py-3 border-b flex items-center gap-1">
			<Play theme="outline" size="20" fill="#333" />
			<div className="flex items-center justify-between flex-1">
				<Link to='/'>
					{video.title}
				</Link>
				<div className="flex text-xs text-muted-foreground">
					{dayjs(video.created_at).fromNow()}
				</div>
			</div>
		</main>
	)
}
