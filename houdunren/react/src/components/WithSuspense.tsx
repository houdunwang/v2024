import { useNavigate } from '@tanstack/react-router'
import React, { Suspense } from 'react'
import { ErrorBoundary } from 'react-error-boundary'
import toast from 'react-hot-toast'
import { Loading } from './Loading'
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
      navigate({ to: '/result/404' })
      break
    case 403:
      toast.error('你没有访问权限', { duration: 3000, id: '403' })
      navigate({ to: '/' })
      break
    case 429:
      toast.error('请求过于频繁', { duration: 3000, id: '429' })
      break
    case 422:
      // navigate({ to: '/result/500' })
      break
    default:
    // navigate({ to: '/result/500' })
  }
  return null
}
export const WithSuspense = React.forwardRef<HTMLDivElement, Props>(({ children }) => {
  return (
    <ErrorBoundary FallbackComponent={ErrorBoundaryFallback}>
      <Suspense fallback={<Loading />}>{children}</Suspense>
    </ErrorBoundary>
  )
})
