import { useState } from 'react'
import Result from './components/Result'
import Search from './components/Search'
import { CodeContext } from './context/CodeContext'
import { DataType } from './data'
import { StyleSheetManager } from 'styled-components'
import isPropValid from '@emotion/is-prop-valid'
{
  /* <StyleSheetManager shouldForwardProp={...}>` (connect an API like `@emotion/is-prop-valid` */
}
function App(): JSX.Element {
  const [data, setData] = useState<DataType[]>([])
  return (
    <StyleSheetManager shouldForwardProp={isPropValid}>
      <CodeContext.Provider value={{ data, setData }}>
        <Search />
        <Result />
      </CodeContext.Provider>
    </StyleSheetManager>
  )
}

export default App
