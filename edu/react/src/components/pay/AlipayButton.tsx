import { Alipay } from '@icon-park/react'
import { Button } from '../ui/button'

export const AlipayButton = () => {
	return <Button
		variant="default"
		className="flex bg-blue-600 hover:bg-blue-500"
	>
		<Alipay theme="filled" size="30" /> 支付宝
	</Button>
}
