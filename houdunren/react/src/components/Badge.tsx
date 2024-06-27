import classNames from 'classnames';
import React from 'react'
interface Props extends React.HTMLAttributes<HTMLDivElement> {
	borderColor?: string;
	backgroundColor?: string;
}
export const Badge = ({ backgroundColor, borderColor, children, ...props }: Props) => {
	const defaultClass = 'bg-orange-100 border border-orange-500 px-2 flex items-center justify-center rounded-md scale-90 dark:bg-hd-background'
	return (
		<div {...props} className={classNames(defaultClass, backgroundColor, borderColor)}>
			{children}
		</div >
	)
}
