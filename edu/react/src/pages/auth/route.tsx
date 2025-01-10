import { useAxios } from '@/hooks/useAxios'
import { createFileRoute, Outlet } from '@tanstack/react-router'

export const Route = createFileRoute('/auth')({
  component: RouteComponent,
})

function RouteComponent() {
  const { http } = useAxios()
  http.get('/sanctum/csrf-cookie', { baseURL: '/' })
  return <Outlet />
}
