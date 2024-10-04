import { Toaster } from 'react-hot-toast'
import { useAppQuery } from './hooks/useAppQuery'
import { useAppRouter } from './hooks/useAppRouter'

function App() {
  const { RouterProvider, router } = useAppRouter()
  const { QueryProvider } = useAppQuery()
  return (
    <QueryProvider>
      <RouterProvider router={router} />
      <Toaster />
    </QueryProvider>
  )
}

export default App
