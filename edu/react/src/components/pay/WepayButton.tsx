import { Wechat } from '@icon-park/react'
import { Button } from '../ui/button'

export const WepayButton = () => {
	return <Button
		variant="default"
		className="flex bg-green-600 hover:bg-green-500"
	>
		<Wechat theme="outline" size="30" />
		微信支付
	</Button>
}
