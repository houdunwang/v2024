import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card'
import { ReactNode } from '@tanstack/react-router'
import { FC } from 'react'

interface Props {
	title: string,
	description: string,
	children: ReactNode
}
export const LessonLayout: FC<Props> = ({ title, description, children }) => {
	//jsx vue3 
	return (
		<main className="container">
			<Card>
				<CardHeader>
					<CardTitle className='text-4xl text-center pt-12'>{title}</CardTitle>
					<CardDescription className=' text-center py-6'>{description}</CardDescription>
				</CardHeader>
				<CardContent>
					{children}
				</CardContent>
			</Card>
		</main>
	)
}
