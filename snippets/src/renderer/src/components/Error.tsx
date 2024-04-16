import { useStore } from '@renderer/store/useStore'
import { useEffect } from 'react'

function Error() {
  const { error, setError } = useStore()
  useEffect(() => {
    const id = setTimeout(() => setError(''), 2000)
    return () => clearTimeout(id)
  }, [error])

  if (!error) return <></>

  return (
    <>
      <div className="bg-red-600 text-white">{error}</div>
    </>
  )
}

export default Error
