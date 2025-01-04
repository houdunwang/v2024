import { Button } from '@/components/ui/button'
import { createFileRoute } from '@tanstack/react-router'
import classNames from 'classnames'
import { useState } from 'react'

export const Route = createFileRoute('/feature/useState')({
	component: RouteComponent,
})

function RouteComponent() {
	const [loading, setLoading] = useState(false)
	return <main className="bg-white container py-32 flex flex-col justify-center items-center text-4xl font-bold gap-12">
		{loading}
		<Button variant={'default'} onClick={() => setLoading(!loading)}>增加</Button>
		<div className={classNames("bg-violet-500 text-white p-12 rounded-lg ", {
			'hidden': loading
		})}
		>
			晚八点直播
		</div>
	</main>
}
