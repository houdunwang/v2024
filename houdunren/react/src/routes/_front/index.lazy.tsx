import { EditOutlined, EllipsisOutlined, SettingOutlined } from '@ant-design/icons'
import { createLazyFileRoute } from '@tanstack/react-router'
import { Avatar, Card, List } from 'antd'
import { Random } from 'mockjs'

export const Route = createLazyFileRoute('/_front/')({
	component: Index,
})

function Index() {
	return (
		<main className="container grid sm:grid-cols-[1fr_350px] gap-3 items-start">
			<Card title="网站动态" >
				<List
					pagination={{ position: 'bottom', align: 'center', total: 100, pageSize: 10 }}
					dataSource={[...Array(10)].map(_ => ({
						title: Random.csentence(10, 80),
						description: Random.cparagraph(1)
					}))}
					renderItem={(item, index) => (
						<List.Item>
							<List.Item.Meta
								avatar={<Avatar src={`/images/user/${index + 1}.jpg`} />}
								title={<a href="https://ant.design">{item.title}</a>}
								description={
									<div>
										{Random.cword(3)} 发表于 {Random.integer(1, 90)} 天前
									</div>
								}
							/>
						</List.Item>
					)}
				/>
			</Card>

			<section className='grid gap-3'>
				<Card
					title="温馨提示"
					actions={[
						<SettingOutlined key="setting" />,
						<EditOutlined key="edit" />,
						<EllipsisOutlined key="ellipsis" />,
					]}
				>
					<div className="text-center">
						后盾人是一个主张友好、分享、自由的技术交流社区。
						请记住我们的口号
						<div className='text-hd-primary font-bold'>后盾人 人人做后盾</div>
					</div>

				</Card>
				<Card title="学习动态" >
					<List
						dataSource={[...Array(6)].map(_ => ({
							title: Random.csentence(10, 20),
							description: Random.cparagraph(1)
						}))}
						renderItem={(item, index) => (
							<List.Item>
								<List.Item.Meta
									avatar={<Avatar src={`/images/user/${index + 1}.jpg`} shape='square' />}
									title={<a href="https://ant.design">{item.title}</a>}
									description={
										<div>
											{Random.cword(3)} 发表于 {Random.integer(1, 90)} 天前
										</div>
									}
								/>
							</List.Item>
						)}
					/>
				</Card>
			</section>
		</main>
	)
}
