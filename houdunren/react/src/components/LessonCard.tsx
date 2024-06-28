import React from 'react'
interface Props extends React.HTMLAttributes<HTMLDivElement> {
	header: React.ReactNode,
	footer: React.ReactNode,
	title: string,
	description: string,
}
const LessonCard = ({ title, header, description, footer, ...props }: Props) => {
	return (
		<div className="border border-hd-border overflow-hidden rounded-lg cursor-pointer group ">
			{header}
			<div className="px-5 pb-5 mt-3">
				<h4 className='text-base font-bold mb-2 truncate'>{title}</h4>
				<div className='text-sm opacity-80'>{description}</div>
			</div>
			{footer}
			{props.children}
		</div>
	)
}


interface FooterProps extends React.HTMLAttributes<HTMLDivElement> {
}

function Footer({ ...props }: FooterProps) {
	return (
		<div className='border-t border-hd-border flex justify-between items-center py-3 px-5 text-xs' {...props}>
			{props.children}
		</div>
	)
}

LessonCard.Footer = Footer

export { LessonCard }
