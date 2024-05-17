import isPropValid from '@emotion/is-prop-valid'
import { StyleSheetManager } from 'styled-components'
import Result from '@renderer/components/Result'
import Search from '@renderer/components/Search'
import useShortCut from '@renderer/hooks/useShortCut'
import Error from '@renderer/components/Error'
import { MutableRefObject, useEffect, useRef } from 'react'
import useIgnoreMouseEvents from '@renderer/hooks/useIgnoreMouseEvents'

function Home(): JSX.Element {
  const mainRef = useRef<HTMLDivElement | null>(null)
  const { setIgnoreMouseEvents } = useIgnoreMouseEvents()
  useEffect(() => {
    setIgnoreMouseEvents(mainRef as MutableRefObject<HTMLDivElement>)
    window.api.openConfigWindow()
  }, [])
  const { register } = useShortCut()
  register('search', 'CommandOrControl+Shift+]')
  return (
    <StyleSheetManager shouldForwardProp={isPropValid}>
      <main className="relative p-3" ref={mainRef}>
        <Error />
        <Search />
        <Result />
      </main>
    </StyleSheetManager>
  )
}

export default Home
