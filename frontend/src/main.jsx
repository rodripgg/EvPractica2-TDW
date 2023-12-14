import React from 'react'
import ReactDOM from 'react-dom/client'
import './index.css'
import { createBrowserRouter, RouterProvider, Navigate } from "react-router-dom";
import Interacciones from './pages/Interacciones.jsx';
import DogSelector from './pages/DogSelector.jsx';

const Router = createBrowserRouter([

  {
    path: '/interacciones',
    element: <Interacciones />
  },
  {
    path: '/',
    element: <DogSelector/>
  },
  {
    path: '*',
    element: <Navigate to="/" />
  }

]);

ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>
    <RouterProvider router={Router} />
  </React.StrictMode>,
)

export default Router;