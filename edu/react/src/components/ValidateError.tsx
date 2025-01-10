import { ValidateStore } from '@/store/ValidateStore'
import { ValidationError } from '@tanstack/react-form'
import { FC } from 'react'

export const ValidateError: FC<{ name: string, errors: ValidationError[] }> = ({ name, errors }) => {
	const validateErrors = ValidateStore(state => state.errors)
	if (errors.length === 0 && !validateErrors[name]) return null
	return (
		<div className='bg-gray-800 text-white border mt-3 px-3 py-1 text-xs rounded-[5px]'>
			{errors.join('')}
			{validateErrors[name]}
		</div>
	)
}
