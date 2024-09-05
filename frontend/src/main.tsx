import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import App from './App'
import { createBrowserRouter, RouterProvider } from 'react-router-dom'
import './index.css'
import {AuthLogin} from './routes/auth/AuthLogin'
import { AuthRegister } from './routes/auth/AuthRegister'

const router = createBrowserRouter([
  {
    path: "/",
    element: <App />,
  },
  {
    path: "/auth/login",
    element: <AuthLogin />,
  },
  {
    path: "/auth/register",
    element: <AuthRegister />
  }
]);

createRoot(document.getElementById('root')!).render(
  <StrictMode>
    <RouterProvider router={router} />
  </StrictMode>,
)
