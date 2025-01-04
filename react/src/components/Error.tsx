import { AxiosError } from 'axios'
import React from 'react'

export const Error = ({ error }: { error: AxiosError }) => {
	// switch(error.status) {
	// 	case 401:
	// 		return (
	// 			<div>未授权...</div>
	// 		)
	// 	case 404:
	// 		return (
	// 			<div>未找到...</div>
	// 		)
	// 	default:
	// 		// eslint-disable-next-line react/jsx-no-useless-fragment
	// 		return
	// }
	return (
		<div>请求异常...</div>
	)
}
