import React from 'react'

const Dashboard = React.lazy(() => import('./views/dashboard/Dashboard'))
const Login = React.lazy(() => import('./Pages/Login/Login'))
const Register = React.lazy(() => import('./Pages/Register/Register'))


const routes = [
  { path: '/User/Dashboard', name: 'Dashboard', element: Dashboard },
  { path: '/User/Login', name: 'Login', element: Login },
  { path: '/User/Register', name: 'Register', element: Register },
]

export default routes
