import { Category } from '@renderer/pages/Category'
import Config from '@renderer/pages/Config'
import { Content } from '@renderer/pages/Content'
import Home from '@renderer/pages/Home'
import { createHashRouter } from 'react-router-dom'

const router = createHashRouter([
  {
    path: '/',
    element: <Home />
  },
  {
    path: 'config',
    element: <Config />,
    children: [
      {
        path: '',
        element: <Category />,
        children: [
          {
            index: true,
            element: <Content />
          }
        ]
      }
    ]
  }
])
export default router
