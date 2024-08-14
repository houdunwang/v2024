import { createLazyFileRoute } from '@tanstack/react-router'

export const Route = createLazyFileRoute('/front/about')({
  component: () => <div>Hello /about!</div>,
})
