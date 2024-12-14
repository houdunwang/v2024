import '@/assets/global.scss'
import {
	QueryClient,
	QueryClientProvider
} from '@tanstack/react-query'
import { FC, ReactNode } from 'react'

const queryClient = new QueryClient({
	defaultOptions: {
		queries: {
			retry: 0
		}
	}
})
export const useAppQuery = () => {
	const AppQueryProvider: FC<{ children: ReactNode }> = ({ children }) => {
		return <QueryClientProvider client={queryClient}>
			{children}
		</QueryClientProvider>
	}
	return { AppQueryProvider }
}