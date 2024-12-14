import { useAppQuery } from './hooks/useAppQuery'
import { useAppRouter } from './hooks/useAppRouter'

export const App = () => {
	const { AppQueryProvider } = useAppQuery()
	const { AppRouterProvider } = useAppRouter()
	return (
		<AppQueryProvider>
			<AppRouterProvider />
		</AppQueryProvider>
	)
}
