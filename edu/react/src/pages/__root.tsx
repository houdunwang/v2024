import { IUserAuth } from '@/hooks/useAuth'
import { createRootRouteWithContext, Outlet } from '@tanstack/react-router'
import { TanStackRouterDevtools } from '@tanstack/router-devtools'
import axios from 'axios'

interface ContextProps {
  auth: IUserAuth,
}
export const Route = createRootRouteWithContext<ContextProps>()({
  component: RouteComponent,
  beforeLoad: async ({ context }) => {
    axios.get('/sanctum/csrf-cookie', { baseURL: '/' })
    await context.auth.getUserInfo()
  }
})

function RouteComponent() {
  return <>
    <Outlet />
    <TanStackRouterDevtools />
  </>
}