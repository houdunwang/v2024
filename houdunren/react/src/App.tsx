import { Activities } from './components/Activities'
import { Navbar } from './components/Navbar'

function App() {
  return (
    <>
      <Navbar />
      <div className='container mb-60'>
        <Activities />
      </div>
    </>
  )
}

export default App
