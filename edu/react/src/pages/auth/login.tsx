import { Button } from '@/components/ui/button'
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from '@/components/ui/card'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import { ValidateError } from '@/components/ValidateError'
import { useLoginMuation } from '@/services/auth'
import { useForm } from '@tanstack/react-form'
import { createFileRoute, Link } from '@tanstack/react-router'
import zod from 'zod'

export const Route = createFileRoute('/auth/login')({
	component: RouteComponent,
})
const zodSchema = zod.object({
	account: zod.string().min(1, '用户名不能为空'),
	password: zod.string().min(1, '密码长度不能为空')
})
function RouteComponent() {
	const loginMutation = useLoginMuation()
	const form = useForm({
		defaultValues: {
			account: 'admin',
			password: 'admin888'
		},
		validators: {
			onChange: zodSchema
		},
		onSubmit: async ({ value }) => {
			loginMutation.mutate(value)
		}
	})
	return <main className="flex items-center justify-center h-screen">
		<form onSubmit={e => {
			e.stopPropagation()
			e.preventDefault()
			form.handleSubmit()
		}}>
			<section className="flex ">
				<Card className='lg:w-[350px] rounded-r-none'>
					<CardHeader>
						<CardTitle>用户登录</CardTitle>
						<CardDescription>欢迎你访问网站</CardDescription>
					</CardHeader>
					<CardContent className='space-y-6'>
						<form.Field name="account" children={field => (
							<div>
								<Label htmlFor="email">登录帐号</Label>
								<Input value={field.state.value} onChange={e => field.handleChange(e.target.value)} />
								<ValidateError errors={field.state.meta.errors} name="account" />
							</div>
						)} />
						<form.Field name="password" children={field => (
							<div>
								<Label htmlFor="password">登录密码</Label>
								<Input type='password' value={field.state.value} onChange={e => field.handleChange(e.target.value)} />
								<ValidateError errors={field.state.meta.errors} name="password" />
							</div>
						)} />
						<Button variant="default" >登录</Button>
					</CardContent>
					<CardFooter >
						<div className="flex gap-2 text-xs justify-center w-full text-muted-foreground">
							<Link to='/'>网站首页</Link>
							<Link to='/'>用户注册</Link>
							<Link to='/'>找回密码</Link>
							<Link to='/'>会员登录</Link>
						</div>
					</CardFooter>
				</Card>
				<div className="w-[350px] rounded-r-sm" style={{
					backgroundImage: `url(/images/login.jpg)`,
				}}>
					{/* <img src="/images/login.jpg" alt="" /> */}
				</div>
			</section>
		</form>
	</main>
}
