import { createFileRoute } from '@tanstack/react-router'

export const Route = createFileRoute('/_front/topic')({
  component: RouteComponent,
})

function RouteComponent() {
  return <div>Hello "/front/topic"!</div>
}
