import { getCurrentUser } from '@/api/user'
import { ScrollToTop } from '@/components/ScrollToTop'
import { IAuth } from '@/hooks/useAuth'
import { createRootRouteWithContext, Outlet } from '@tanstack/react-router'
import { TanStackRouterDevtools } from '@tanstack/router-devtools'
import React from 'react'

export const Route = createRootRouteWithContext<{ auth: IAuth }>()({
  component: RootPage,
  beforeLoad: async ({ context }) => {
    if (context.auth.isAuthenticated()) {
      const user = await getCurrentUser()
      context.auth.setUser(user)
    }
  },
})

function RootPage() {
  return (
    <React.Fragment>
      <ScrollToTop />
      <Outlet />
      <TanStackRouterDevtools />
    </React.Fragment>
  )
}
