import { Button } from '@/components/ui/button'
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from '@/components/ui/card'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import { Textarea } from '@/components/ui/textarea'
import { ValidateError } from '@/components/ValidateError'
import { useAddArticle, useUpdateArticle } from '@/services/article'
import { IArticle } from '@/types/article'
import { useForm } from '@tanstack/react-form'
import classNames from 'classnames'
import { z } from 'zod'
interface Props {
	title: string
	data: IArticle
}
//zod yup 
const articleSchema = z.object({
	title: z.string().min(5, '标题不能少于5个字'),
	preview: z.string().min(1, '请选择图片'),
	content: z.string().min(10, '内容不能少于10个字'),
})
export const Form = ({ title, data }: Props) => {
	const addMutation = useAddArticle()
	const updateMutation = useUpdateArticle()
	const form = useForm({
		defaultValues: data,
		validators: {
			onChange: articleSchema
		},
		onSubmit: async ({ value }) => {
			const mutation = data?.id ? updateMutation : addMutation
			mutation.mutate(value as IArticle)
		}
	})
	return <main className='container'>
		<form onSubmit={e => {
			e.preventDefault()
			e.stopPropagation()
			form.handleSubmit()
		}}>
			<Card>
				<CardHeader>
					<CardTitle>{title}</CardTitle>
					<CardDescription>请发表正能量的内容</CardDescription>
				</CardHeader>
				<CardContent>
					<form.Field name="title"
						// validators={{
						// 	onChange: ({ value }) => {
						// 		return value.length < 5 ? '标题不能少于5个字!' : undefined
						// 	}
						// }} 
						children={field => (
							<div>
								<Label htmlFor="email">标题</Label>
								<Input value={field.state.value} onChange={e => field.handleChange(e.target.value)} />
								{/* {field.state.meta.errors.length > 0 &&
									<div className='bg-gray-900 text-white mt-2 text-xs rounded-[5px] px-2 py-1'>
										{field.state.meta.errors.join('')}
									</div>} */}
								<ValidateError errors={field.state.meta.errors} />
							</div>
						)} />
					<form.Field name='preview' children={field => (
						<div className='mt-3'>
							<Label htmlFor="email">标题</Label>
							<div className='flex gap-3'>
								{Array(10).fill(0).map((_, i) => (
									<img key={i}
										src={`/images/${i + 1}.jpeg`}
										className={classNames(
											'w-12 h-12 object-cover rounded-sm cursor-pointer hover:scale-125 duration-200',
											{ 'border-4 border-red-500': field.state.value === `/images/${i + 1}.jpeg` }
										)}
										onClick={() => field.handleChange(`/images/${i + 1}.jpeg`)} />
								))}
							</div>
							<ValidateError errors={field.state.meta.errors} />
						</div>
					)} />
					<form.Field name='content' children={field => (
						<div className='mt-3'>
							<Label htmlFor="email">文章内容</Label>
							<Textarea value={field.state.value} onChange={e => field.handleChange(e.target.value)} rows={6} />
							<ValidateError errors={field.state.meta.errors} />
						</div>
					)} />
				</CardContent>
				<CardFooter>
					<Button variant="outline">保存提交</Button>
				</CardFooter>
			</Card>
		</form>
	</main >

}
