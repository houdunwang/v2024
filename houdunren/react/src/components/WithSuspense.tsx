import { useNavigate } from '@tanstack/react-router'
import React, { Suspense } from 'react'
import { ErrorBoundary } from 'react-error-boundary'
import toast from 'react-hot-toast'
import { Loading } from './Loading'
import { E404 } from './error/E404'
import { E403 } from './error/E403'
import { E500 } from './error/E500'
interface Props extends React.HTMLAttributes<HTMLDivElement> {
  children: React.ReactNode
}

const ErrorBoundaryFallback = ({ error }: { error: any }) => {
  const navigate = useNavigate()
  switch (error?.status) {
    case 401:
      toast.error('请登录后操作', { duration: 3000, id: '401' })
      navigate({ to: '/auth/login' })
      break
    case 404:
      return <E404 />
    case 403:
      return <E403 />
    case 429:
      toast.error('请求过于频繁', { duration: 3000, id: '429' })
      break
  }
  return <E500 />
}
export const WithSuspense = React.forwardRef<HTMLDivElement, Props>(
  ({ children }, ref) => {
    return (
      <div ref={ref}>
        <ErrorBoundary FallbackComponent={ErrorBoundaryFallback}>
          <Suspense fallback={<Loading />}>{children}</Suspense>
        </ErrorBoundary>
      </div>
    )
  },
)
