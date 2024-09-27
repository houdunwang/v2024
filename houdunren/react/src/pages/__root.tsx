import { ScrollToTop } from '@/components/ScrollToTop'
import { QueryClient, QueryClientProvider } from '@tanstack/react-query'
import { createRootRoute, Outlet } from '@tanstack/react-router'
import { TanStackRouterDevtools } from '@tanstack/router-devtools'

export const Route = createRootRoute({
  component: () => {
    const queryClient = new QueryClient({
      defaultOptions: {},
    })
    return (
      <>
        <QueryClientProvider client={queryClient}>
          <ScrollToTop />
          <Outlet />
          <TanStackRouterDevtools />
        </QueryClientProvider>
      </>
    )
  },
})
