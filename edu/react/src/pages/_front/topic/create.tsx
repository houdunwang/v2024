import { ValidateError } from '@/components/ValidateError'
import { MarkdownEditor } from '@/components/editor/MarkdownEditor'
import { Button } from '@/components/ui/button'
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from '@/components/ui/card'
import { Input } from '@/components/ui/input'
import { useForm } from '@tanstack/react-form'
import { createFileRoute } from '@tanstack/react-router'
import zod from 'zod'
export const Route = createFileRoute('/_front/topic/create')({
	component: RouteComponent,
	beforeLoad: ({ context }) => {
		context.auth.check()
	}
})
const zodSchema = zod.object({
	title: zod.string().min(5, '标题不能少于5个字符'),
	content: zod.string().min(10, '内容不能少于10个字符')
})
function RouteComponent() {
	const form = useForm({
		defaultValues: {
			title: '',
			content: ''
		},
		validators: {
			onChange: zodSchema
		},
		onSubmit: async ({ value }) => {
			console.log(value);
		}
	})
	return <main className="container">
		<form onSubmit={e => {
			e.preventDefault()
			e.stopPropagation()
			form.handleSubmit()
		}}>
			<Card>
				<CardHeader>
					<CardTitle>发表话题</CardTitle>
					<CardDescription>请发布内容清晰、友好的话题</CardDescription>
				</CardHeader>
				<CardContent className='space-y-6'>
					<form.Field name='title' children={field => (
						<div>
							<Input value={field.state.value} onChange={e => field.handleChange(e.target.value)} />
							<ValidateError name='title' errors={field.state.meta.errors} />
						</div>
					)} />
					<form.Field name='content' children={field => (
						<div>
							<MarkdownEditor onChange={value => {
								field.handleChange(value)
							}} />
							<ValidateError name='content' errors={field.state.meta.errors} />
						</div>
					)} />
				</CardContent>
				<CardFooter>
					<Button variant="outline" >保存提交</Button>
				</CardFooter>
			</Card>
		</form>
	</main>
}
