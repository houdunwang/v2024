import { ITopic } from '@/types/topic'
import { Link } from '@tanstack/react-router'
import dayjs from 'dayjs'
import { UserAvatar } from '../user/UserAvatar'
import { TopicDiscussion } from '@icon-park/react'

export const TopicItem = ({ topic }: { topic: ITopic }) => {
	return (
		<div className='border-b py-3 flex items-center gap-3'>
			<UserAvatar user={topic.user} />
			<div className='flex flex-col justify-between'>
				<Link to={`/topic/$id`} params={{ id: String(topic.id) }}>{topic.title}</Link>
				<span className="text-xs text-muted-foreground">
					<Link to={`/`} >{topic.user.nickname}</Link>	{dayjs(topic.created_at).fromNow()}
				</span>
			</div>
		</div>
	)
}
