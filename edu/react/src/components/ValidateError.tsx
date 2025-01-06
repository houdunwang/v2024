import { ValidationError } from '@tanstack/react-form'
import React, { FC } from 'react'

export const ValidateError: FC<{ errors: ValidationError[] }> = ({ errors }) => {
	if (errors.length === 0) return null
	return (
		<div className='bg-gray-800 text-white border mt-3 px-3 py-1 text-xs rounded-[5px]'>{errors.join('')}</div>
	)
}
