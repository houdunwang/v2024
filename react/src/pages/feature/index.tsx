import { Button } from '@/components/ui/button'
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card'
import { createFileRoute, Link } from '@tanstack/react-router'

export const Route = createFileRoute('/feature/')({
	component: RouteComponent,
})

function RouteComponent() {
	return <main className="container"><Card>
		<CardHeader>
			<CardTitle>React 特性</CardTitle>
			<CardDescription>分享React一些特性知识点</CardDescription>
		</CardHeader>
		<CardContent>
			<Link to="/feature/useState">
				<Button variant="outline">useState</Button>
			</Link>
		</CardContent>
	</Card>
	</main>
}
