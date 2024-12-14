import { Button, Result } from 'antd';

export const E404 = () => {
	return (
		<Result
			status="404"
			title="404"
			subTitle="你访问的内容不存在 www.houdunren.com"
			extra={<Button type="primary">Back Home</Button>}
		/>
	)
}
