import { AxiosError } from 'axios'
import { FC } from 'react'
import { E403 } from './E403'

export const Error: FC<{ error: AxiosError }> = ({ error }) => {
	console.log(error);
	return <E403 />
}
