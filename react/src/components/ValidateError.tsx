import { Info } from '@icon-park/react'
import { ValidationError } from '@tanstack/react-form'
interface Props {
	errors: ValidationError[]
}
export const ValidateError = ({ errors }: Props) => {
	if (errors.length === 0) return null
	//全局状态里面 
	return (
		<div className='flex items-center gap-1 bg-gray-900 text-white px-2 py-1 rounded-[5px] mt-2 text-xs'>
			<Info />	{errors.join('')}
		</div>
	)
}
