import { FC } from 'react'
import { E403 } from './E403'
import { E404 } from './E404'
import { AxiosError } from 'axios'

export const Error: FC<{ error: AxiosError }> = ({ error }) => {
	switch (error.status) {
		case 403:
			return <E403 />
		case 404:
			return <E404 />
	}
}
