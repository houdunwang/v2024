import isPropValid from '@emotion/is-prop-valid'
import { StyleSheetManager } from 'styled-components'
import Result from './components/Result'
import Search from './components/Search'
import useShortCut from './hooks/useShortCut'
import Error from './components/Error'

function App(): JSX.Element {
  const { register } = useShortCut()
  register('search', 'CommandOrControl+Shift+/')
  return (
    <StyleSheetManager shouldForwardProp={isPropValid}>
      <Error />
      {/* <CodeProvider> */}
      <Search />
      <Result />
      {/* </CodeProvider> */}
    </StyleSheetManager>
  )
}

export default App
