import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import './assets/global.scss'
import '@/plugins/dayjs'
import App from './App'

createRoot(document.getElementById('root')!).render(
  <StrictMode>
    <App />
  </StrictMode>,
)
