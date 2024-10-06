import { Toaster } from 'react-hot-toast'
import { useAppQuery } from './hooks/useAppQuery'
import { useAppRouter } from './hooks/useAppRouter'

function App() {
  const { AppRouterProvider } = useAppRouter()
  const { QueryProvider } = useAppQuery()
  return (
    <QueryProvider>
      <AppRouterProvider />
      <Toaster />
    </QueryProvider>
  )
}

export default App
