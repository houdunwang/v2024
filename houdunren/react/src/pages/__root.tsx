import { Loading } from '@/components/Loading'
import { ScrollToTop } from '@/components/ScrollToTop'
import { QueryClient, QueryClientProvider } from '@tanstack/react-query'
import { createRootRoute, Outlet } from '@tanstack/react-router'
import { TanStackRouterDevtools } from '@tanstack/router-devtools'

export const Route = createRootRoute({
  component: () => {
    const queryClient = new QueryClient({
      defaultOptions: {
        queries: {
          staleTime: 1000 * 60 * 5,
          gcTime: 1000 * 60 * 10,
        },
      },
    })
    return (
      <>
        <QueryClientProvider client={queryClient}>
          {/* <Loading /> */}
          <ScrollToTop />
          <Outlet />
          <TanStackRouterDevtools />
        </QueryClientProvider>
      </>
    )
  },
})
