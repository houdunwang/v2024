import { ITopic } from '@/types/topic'
import { Link } from '@tanstack/react-router'
import dayjs from 'dayjs'
import { UserAvatar } from '../user/UserAvatar'

export const TopicItem = ({ topic }: { topic: ITopic }) => {
	return (
		<div className='border-b py-3 flex items-center gap-3'>
			<UserAvatar user={topic.user} />
			<Link to='/' className='flex flex-col justify-between'>
				{topic.title}
				<span className="text-xs text-muted-foreground">
					<Link to="/">{topic.user.nickname}</Link>	{dayjs(topic.created_at).fromNow()}
				</span>
			</Link>
		</div>
	)
}
