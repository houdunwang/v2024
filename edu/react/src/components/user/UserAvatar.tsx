import { IUser } from '@/types/user'
import { Link } from '@tanstack/react-router'
import classNames from 'classnames'
import { FC } from 'react'

export const UserAvatar: FC<{ user: IUser, className?: string }> = ({ user, className }) => {
	return (
		<Link to="/">
			<img src={user.avatar} alt="" className={classNames('w-10 h-10 object-cover rounded-sm hover:scale-125 duration-300transition', className)} />
		</Link>
	)
}
