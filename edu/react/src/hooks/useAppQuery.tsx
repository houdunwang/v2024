import {
	QueryClient,
	QueryClientProvider
} from '@tanstack/react-query'
import { ReactNode } from '@tanstack/react-router'
const queryClient = new QueryClient()
export const useAppQuery = () => {
	const QueryProvider = ({ children }: { children: ReactNode }) => {
		return <QueryClientProvider client={queryClient}>
			{children}
		</QueryClientProvider>
	}

	return { QueryProvider }
}