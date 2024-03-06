import React from 'react'
import ReactDOM from 'react-dom/client'
import App from './App'
import '@renderer/assets/global.scss'
import '@renderer/assets/tailwind.css'

ReactDOM.createRoot(document.getElementById('root') as HTMLElement).render(
  <React.StrictMode>
    <App />
  </React.StrictMode>
)
