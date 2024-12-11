import { useAppQuery } from '@/hooks/useAppQuery'
import { useAppRouter } from '@/hooks/useAppRouter'

export const App = () => {
	const { QueryProvider } = useAppQuery()
	const { AppRouterProvider } = useAppRouter()
	return (
		<QueryProvider>
			<AppRouterProvider />
		</QueryProvider>
	)
}
