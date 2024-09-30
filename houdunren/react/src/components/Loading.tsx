import { useIsFetching } from '@tanstack/react-query'
import PulseLoader from 'react-spinners/PulseLoader'

export const Loading = () => {
  const isFetching = useIsFetching()
  if (!isFetching) return
  return (
    <div className='flex justify-center items-center h-screen fixed top-0 w-screen bg-white z-50'>
      <PulseLoader color='#6b46c1' />
    </div>
  )
}
