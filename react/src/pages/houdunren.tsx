import { createFileRoute } from '@tanstack/react-router'

export const Route = createFileRoute('/houdunren')({
  component: RouteComponent,
})

function RouteComponent() {
  return <div>houdunren.com</div>
}
